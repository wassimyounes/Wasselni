<?php 

require_once("../database/connect.php");
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $vtype = isset($_POST['vehicletype']) ? $_POST['vehicletype'] : null;
    $vmake = isset($_POST['vehiclemake']) ? $_POST['vehiclemake'] : null;
    $vyear = isset($_POST['vehicleyear']) ? $_POST['vehicleyear'] : null;
    $licenseplate = isset($_POST['Licenseplate']) ? $_POST['Licenseplate'] : null;
        $conn->beginTransaction();
        try{
 
            //  check if email exists 
            $stmt = $conn->prepare("SELECT * FROM drivers WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {    
                // echo $email . " already exists ";
                header('Content-Type: application/json');
                echo json_encode([$email . " already exists."]);
                return;
            } else {          
                // inserting to drivers table
                $stmt1 = $conn->prepare("INSERT INTO drivers (firstname, lastname, email, phonenumber)
                VALUES (:firstname, :lastname, :email, :phonenumber)");
                 $stmt1->bindParam(':firstname', $firstname);
                 $stmt1->bindParam(':lastname', $lastname);
                //  check if email is valid
                 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header('Content-Type: application/json');
                    echo json_encode(["Invalid email Address."]);
                    exit();

                } else {
                    $stmt1->bindParam(':email', $email);
                }

                 $stmt1->bindParam(':phonenumber', $phone);
                 $stmt1->execute();

                 
                // last inserted id to reference the primary key in the first table acting as a foreign key in the second table
                 $lastInsertedId = $conn->lastInsertId();
    
                // inserting into vehicle_info table
                $stmt2 = $conn->prepare("INSERT INTO vehicle_info (driver_id, vehicle_type, vehicle_make, year, license_plate)
                VALUES (:driver_id, :vehicletype, :vehiclemake, :vehicleyear, :Licenseplate)");
                $stmt2->bindParam(':driver_id', $lastInsertedId);
                $stmt2->bindParam(':vehicletype', $vtype);
                $stmt2->bindParam(':vehiclemake', $vmake);
                $stmt2->bindParam(':vehicleyear', $vyear);
                $stmt2->bindParam(':Licenseplate', $licenseplate);
                $stmt2->execute();
    
                $conn->commit();
            }
        }catch(PDOException $e){
            $conn->rollBack();
            echo json_encode(["error" => "error inserting data" . $e->getMessage()]);
        }


} else {
    http_response_code(405);

    echo json_encode(["error" => "invalid request method"]);
}

$conn = null;