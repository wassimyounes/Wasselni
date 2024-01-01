<?php 

require_once __DIR__ . "/../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

$emailUsername = $_ENV["EMAIL_USERNAME"];
$emailPassword = $_ENV["EMAIL_PASSWORD"];


$mail = new PHPMailer(true);
        //  fot testing only ---- driver's data should be retrieved from databse
        $id = 1; 
        $token = bin2hex(random_bytes(16));
        echo $token . "<br>";
        $secretKey = $token . "|" . $id;
        $hmac = hash_hmac("sha256", $secretKey, $token);
        $confirmationToken =$secretKey . "?" . $hmac;
        echo $confirmationToken . "<br>";
        $confirmationLink = "http://localhost/wasselni/driver/driver-confirmation.php?token=$confirmationToken";
        echo $confirmationLink . "<br>";
// if($_SERVER["REQUEST_METHOD"] === "POST") {

//     $data = json_decode(file_get_contents("php://input"), true);
//     if($data) {
//         $id = $data["id"];
//         $email = $data["email"];
//         $firstname = $data["firstName"];
//        $token = bin2hex(random_bytes(16));
//         echo $token . "<br>";
//         $secretKey = $token . "|" . $id;
//         $hmac = hash_hmac("sha256", $secretKey, $token);
//         $confirmationToken =$secretKey . "?" . $hmac;
//         echo $confirmationToken . "<br>";
//         $confirmationLink = "http://localhost/wasselni/driver/driver-confirmation.php?token=$confirmationToken";
//         echo $confirmationLink . "<br>";
//     } else {
//         echo json_encode("no data received");
//         return;
//     }


//     try {
//         //Server settings
//         $mail->SMTPDebug = SMTP::DEBUG_SERVER;             
//         $mail->isSMTP();                                        
//         $mail->Host       = 'smtp.gmail.com';                   
//         $mail->SMTPAuth   = true;                                  
//         $mail->Username   = $emailUsername;                   
//         $mail->Password   = $emailPassword;                              
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
//         $mail->Port       = 465;                                   
    
//         //Recipients
//         $mail->setFrom('noreply@wasselni.com', 'Wasselni');
//         $mail->addAddress($email, $firstname);  
    
    
//         //Content
//         $mail->isHTML(true);                   
//         $mail->Subject = 'Confirmation of your registration at Wasselni';
        // $mail->Body    = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        // <style>html {background-color: #fff;}body {font-family: Arial, Helvetica, sans-serif;margin-top: 10px;background-color: #F7B32B; 
        // max-width: 500px;width: 88%; color: black; border-radius: 10px ; height: 50vh; padding: 20px;margin: auto;}div {font-family: Arial, Helvetica, sans-serif; font-size: 25px; color: #fff;text-align: center; line-height: 80px;}span {color: black;font-size:30px;  font-weight: 800;}
        // p {font-size: 18px;}button {background-color: #60222D; padding: 9px 17px; border-radius: 5px; border: none; color: #fff;font-size: 12px;}
        // </style></head><body><div><span>W</span>asselni</div><p>Dear " . $firstname . ",</p><br><p>To complete your registration, please click the button below,<br><br><br><br><a href=" . $confirmationLink . "><button>Continue</button></a><br><br><p>Drive safe!</p><p style="margin-top: -15px;">Wasselni Team.</p></body></html>';
    
    
//         $mail->send();
//         echo 'Message has been sent';
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
    

// } else {
//     echo "Unauthorixed request!";

// }
