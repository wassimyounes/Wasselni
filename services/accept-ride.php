<?php
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $rideId = json_decode(file_get_contents("php://input"), true);
    if(isset($rideId["rideId"])) {
    require_once("../database/connect.php");
    $id = $rideId["rideId"];
    $driverId = $_SESSION["driver_id"];
    $_SESSION["ride-id"] = $id;
    $status = "accepted";
    $stmt = $conn->prepare("UPDATE rides SET driver_id = :driver_id, status= :status WHERE id= :id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":driver_id", $driverId);
    $stmt->execute();
    echo json_encode("status updated");
}
}
$conn = null;