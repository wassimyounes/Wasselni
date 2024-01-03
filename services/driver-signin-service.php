<?php
session_start();

if(isset($_SESSION["driver_id"])) {
    header("location: ../driver/driver-portal.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("../database/connect.php");
    if(isset($_POST["email"]) && isset($_POST["password"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];


        $stmt =  $conn->prepare("SELECT id, firstname, email, password FROM drivers WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password , $user["password"])) {
            $_SESSION["driver_id"] = $user["id"];
            $_SESSION["driver_name"] = $user["firstname"];
            $_SESSION["driver_email"] = $user["email"];
            header("location: ../driver/driver-portal.php");
            exit();

        } else {
            echo "wrong email or password";
            $_SESSION["error"] = "wrong credentials";
            header("location: ../driver/driver-signin.php");
            exit();
        }
    } 
    else {
        echo "unauthorized";
    }

}
$conn = null;