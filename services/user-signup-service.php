<?php 

// require_once __DIR__ . "/../vendor/autoload.php";

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
// $dotenv->load();

// use Infobip\Configuration;
// use Infobip\Api\SmsApi;
// use Infobip\Model\SmsDestination;
// use Infobip\Model\SmsTextualMessage;
// use Infobip\Model\SmsAdvancedTextualRequest;
// use Twilio\Rest\Client;

session_start();

# getting user's name and phone number
if($_SERVER["REQUEST_METHOD"] === "POST") {

if(isset($_POST['name']) && isset($_POST['phone'])) {
    echo "from start page<br>";
    $firstname = $_POST['name'];
    $phonenumber = $_POST['phone']; 

    echo $firstname . "<br>";
    echo $phonenumber . "<br>";

    $_SESSION["name"] = $firstname;
    $_SESSION["phone"] = $phonenumber;


    # sending verification code to the user's phone number 
    // $base_url = $_ENV["INFOBIP_API_BASE_URL"];
    // $api_key = $_ENV["INFOBIP_API_KEY"];

    // echo $base_url . "<br>";
    // echo $api_key . "<br>";


    // $verification_code = rand(1000, 9999);
    $verification_code = "1234";
    echo $verification_code . "<br>";
    $_SESSION["ver-code"] = $verification_code;

    // $message = "Hello " . $firstname . ", Your verification code is: " . $verification_code . ". Happy trips!";
    // echo $message . "<br>";



    // $configuration = new Configuration(host: $base_url, apiKey: $api_key);

    // $api = new SmsApi(config: $configuration);

    // $destination = new SmsDestination(to: "961" . $phonenumber);

    // $message = new SmsTextualMessage(
    //     destinations: [$destination],
    //     text: $message,
    //     from: "Wassleni"
    // );

    // $request = new SmsAdvancedTextualRequest(messages: [$message]);

    // $response = $api->sendSmsMessage($request);
    echo "message sent";
    $_SESSION["from_server"] = true;
    header("location: ../user/code.php");
    exit();
}


# getting code
if(isset($_POST['received-verification-code'])) {

    echo "from code page <br>";

    $receivedCode = $_POST['received-verification-code'];

    echo $receivedCode . "<br>";


    $storedName = isset($_SESSION["name"]) ? $_SESSION["name"] : "";
    $storedPhone = isset($_SESSION["phone"]) ? $_SESSION["phone"] : "";
    $storedVerificationCode = isset($_SESSION["ver-code"]) ? $_SESSION["ver-code"] : "";


    echo $storedName . "<br>";
    echo $storedPhone . "<br>";
    echo $storedVerificationCode . "<br>";


    # comparing and validating code
    if($receivedCode == $storedVerificationCode) {
        echo "validated<br>";
        $_SESSION["from_server"] = true;
        header("location: ../user/set-password.php"); 
        exit();
    } else {
        $_SESSION["from_server"] = true;
        header("location: ../user/code.php?error=1");
        echo "<invalid code<br>";
        exit();
    }

}
} else {
    header("location: ../user/start.html"); 
}



    # setting password
    if(isset($_POST['password'])) {
        require_once("../database/connect.php");
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $storedName = isset($_SESSION["name"]) ? $_SESSION["name"] : "";
        $storedPhone = isset($_SESSION["phone"]) ? $_SESSION["phone"] : "";
        // echo $storedName . "<br>";
        // echo $storedPhone . "<br>";
        // echo $password . "<br>";
        // echo $hashedPassword . "<br>";
        $doesExist = $conn->prepare("SELECT * FROM users WHERE phonenumber = :phonenumber");
        $doesExist->bindParam(":phonenumber", $storedPhone);
        $doesExist->execute();
        // password exists?
        if($doesExist->rowCount() > 0) {
            header("location: ../user/signin.php?error=2");
            echo "phone number exists";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (name, phonenumber, password)
            VALUES (:name, :phonenumber, :password)");
            $stmt->bindParam(':name', $storedName);
            $stmt->bindParam(':phonenumber', $storedPhone);
            $stmt->bindParam(':password', $hashedPassword);
            echo "added to db";
            $stmt->execute();
            $_SESSION["from_server"] = true;
            $_SESSION["name"] = $storedName;
            $_SESSION["phone"] = $storedPhone;
            header("location: ../user/welcome.php");
        }
        $conn = null;
    }



?>