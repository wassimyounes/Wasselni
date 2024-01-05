<?php
session_start();
require_once("../database/connect.php");
$phoneNumber = $_SESSION["phone"];
$status = "pending";

$stmt = $conn->prepare("SELECT rides.id, rides.status, users.phonenumber FROM rides JOIN users ON users.id = rides.user_id WHERE users.phonenumber = :phonenumber AND status = :status");
$stmt->bindParam(":phonenumber", $phoneNumber);
$stmt->bindParam(":status", $status);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$rideId = $row["id"];
if(is_array($row) && isset($row["id"])) {
    $_SESSION["ride-id"] = $rideId;
    echo json_encode("pending");
} else {
    echo json_encode("unable to fetch");
}


?>