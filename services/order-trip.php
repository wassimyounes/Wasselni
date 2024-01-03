<?php
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-type: application/json");
    $coordinates = json_decode(file_get_contents("php://input"), true);
    $fromCoords = $coordinates["fromLat"] . ", " . $coordinates["fromLng"];
    $toCoords = $coordinates["toLat"] . ", " . $coordinates["toLng"];
    $userId = $_SESSION["user_id"];
    require_once("../database/connect.php");
    try {
        $stmt = $conn->prepare("INSERT INTO rides (user_id, start_location, end_location)
        VALUES (:userid, :fromCoords, :toCoords)");
        $stmt->bindParam(':userid', $userId);
        $stmt->bindParam(':fromCoords', $fromCoords);
        $stmt->bindParam(':toCoords', $toCoords);
        $stmt->execute();
        echo json_encode(["success" => "data inserted successfully"]);
        exit();
    }catch(PDOException $e){

        echo json_encode(["error" => "error inserting data" . $e->getMessage()]);
    }
}
$conn = null;