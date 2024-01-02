<?php
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-type: application/json");

    $coordinates = json_decode(file_get_contents("php://input"), true);
    $fromCoords = $coordinates["fromLat"] . ", " . $coordinates["fromLng"];
    $toCoords = $coordinates["toLat"] . ", " . $coordinates["toLng"];
    $userId = $_SESSION["user_id"];
    echo json_encode("id: " . $userId . ", From: " . $fromCoords . ", To: " . $toCoords );



    require_once("../database/connect.php");
    try {
        // $conn->exec("SET foreign_key_checks = 0;");
        $stmt = $conn->prepare("INSERT INTO rides (user_id, start_location, end_location)
        VALUES (:userid, :fromCoords, :toCoords)");
        $stmt->bindParam(':userid', $userId);
        $stmt->bindParam(':fromCoords', $fromCoords);
        $stmt->bindParam(':toCoords', $toCoords);
        $stmt->execute();
    }catch(PDOException $e){
        echo json_encode(["error" => "error inserting data" . $e->getMessage()]);
    }
}