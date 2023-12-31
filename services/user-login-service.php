<?php 

session_start();
echo "sigin user";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("../database/connect.php");
    if(isset($_POST["phone"]) && isset($_POST["password"])) {

        $phone = $_POST["phone"];
        $password = $_POST["password"];


        $stmt =  $conn->prepare("SELECT id, name, phonenumber, password FROM users WHERE phonenumber = :phone");
        $stmt->bindParam(":phone", $phone);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password , $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["phone"] = $user["phonenumber"];
            header("location: ../user/welcome.php");
            exit();

        } else {
            echo "wrong email or password";
            $_SESSION["error"] = "wrong credentials";
            header("location: ../user/signin.php");
            exit();
        }
    } 
    else {
        echo "unauthorized";
    }

}
$conn = null;

