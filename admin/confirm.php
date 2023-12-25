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
//         $mail->Body    = '<body style="background-color: #F7B32B; width: 88%; color: black; border-radius: 10px ; height: 100vh; padding: 20px;"><div style="font-family: Arial, Helvetica, sans-serif ; font-size: 25px; text-align: center; line-height: 80px;"><span style=" font-size:30px;  color: #fff;  font-weight: 800;">W</span>asselni</div>
//         <p>Dear ' . $firstname . ',</p><br><p>To complete your registration, please click the button below,<br><br><br><br>
//         <a href=' . $confirmationLink . '><button style="background-color: #60222D; padding: 8px 15px; border-radius: 5px; border: none; color: #fff;font-size: 12px;">Continue</button></a><br><br><p>Drive safe!</p><p style="margin-top: 1px;">Wasselni Team.</p></body>';
    
    
//         $mail->send();
//         echo 'Message has been sent';
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
    

// } else {
//     echo "Unauthorixed request!";

// }
