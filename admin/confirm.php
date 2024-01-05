<?php 

require_once __DIR__ . "/../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

$emailUsername = $_ENV["EMAIL_USERNAME"];
$emailPassword = $_ENV["EMAIL_PASSWORD"];

// update status in database
require_once("../database/connect.php");

$data = json_decode(file_get_contents("php://input"), true);
        $id = $data["id"];
        $stmt = "UPDATE drivers SET is_confirmed = 1 WHERE id = $id";
        $conn->exec($stmt);
        echo json_encode("confirmed");


$mail = new PHPMailer(true);

if($_SERVER["REQUEST_METHOD"] === "POST") {


    if($data) {
        $id = $data["id"];
        $email = $data["email"];
        $firstname = $data["firstName"];
       $token = bin2hex(random_bytes(16));
        echo $token . "<br>";
        $secretKey = $token . "|" . $id;
        $hmac = hash_hmac("sha256", $secretKey, $token);
        $confirmationToken =$secretKey . "?" . $hmac;
        echo $confirmationToken . "<br>";
        $confirmationLink = "http://localhost/wasselni/driver/driver-confirmation.php?token=$confirmationToken";
        echo $confirmationLink . "<br>";
    } else {
        echo json_encode("no data received");
        return;
    }


    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;             
        $mail->isSMTP();                                        
        $mail->Host       = 'smtp.gmail.com';                   
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = $emailUsername;                   
        $mail->Password   = $emailPassword;                              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
        $mail->Port       = 465;                                   
    
        //Recipients
        $mail->setFrom('noreply@wasselni.com', 'Wasselni');
        $mail->addAddress($email, $firstname);  
    
    
        //Content
        $mail->isHTML(true);                   
        $mail->Subject = 'Confirmation of your registration at Wasselni';
        $mail->Body    = '<body style="color: black;font-family: Arial, Helvetica, sans-serif; margin-top: 10px; ">
        <div style="background-color: #F7B32B;font-size: 20px ; height: 70vh;width: 500px ; padding: 19px;">
            <div style="text-align: center; color: #fff; font-size: 23px;"><span style="color: black; font-size:30px;font-weight: 800;">W</span>asselni
            </div><br><br><br>
            <p>Dear ' . $firstname . ',</p><br>
            <p>To complete your registration, please click the button below,<br><br><br><br><a
                    href=' . $confirmationLink . '><button
                        style="background-color: #60222D; padding: 9px 17px; border-radius: 5px; border: none; color: #fff;font-size: 12px;">Continue</button></a><br><br>
            <p>Drive safe!</p>
            <p style="margin-top: -15px;">Wasselni Team.</p>
        </div>
    </body>';
    
    
        $mail->send();
        echo json_encode('Message has been sent');
    } catch (Exception $e) {
        echo json_encode("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
    

} else {
    echo json_encode("Unauthorixed request!");

}
