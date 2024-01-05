<?php
session_start();
require_once("../database/connect.php");
$rideId = $_SESSION["ride-id"];
$stmt = $conn->prepare("SELECT rides.id, rides.status, drivers.firstname, drivers.lastname, drivers.phonenumber, rides.status FROM rides JOIN drivers ON drivers.id = rides.driver_id WHERE rides.id = :ride_id");
$stmt->bindParam(":ride_id", $rideId);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$data = [
    "status" => $row["status"],
    "firstName" => $row["firstname"],
    "lastName" => $row["lastname"],
    "driverPhone" => $row["phonenumber"],
];

if(is_array($row) && isset($row["status"])) {
    echo json_encode($data);
} else {
    echo "ride not accepted yet";
}
?>