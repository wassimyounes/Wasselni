<?php
session_start();
if(isset($_SESSION["driver_id"]) && isset($_SESSION["driver_name"]));
require_once("../database/connect.php");
$status = "pending";    
$stmt = $conn->prepare("SELECT rides.id, rides.start_location, rides.end_location, rides.status, users.name, users.phonenumber FROM rides JOIN users ON users.id = rides.user_id WHERE status = :status");
$stmt->bindParam(":status", $status);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wasselni | driver portal</title>
    <script src="https://kit.fontawesome.com/d7d12ce728.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/driver.css">
</head>

<body>
    <header style="padding-top: 4px">
        <a href="driver-index.html">
            <div class="logo"><span>W</span>asselni</div>
        </a>
        <ul>
            <form action="../services/driver-logout.php" method="post">
            <button class="logout-btn"><i class="fa-solid fa-right-from-bracket fa-xl"></i></button>
            </form>
        </ul>
    </header>
    <main>
        <div class="unavailable-screen">
        Make yourself available to view requests</div>
        <div class="prof">
        <p><?php echo $_SESSION["driver_name"] . "<br>";?> </p>
        <p><i class="fa-solid fa-gear fa-lg"></i></p>

        </div>
        <section id="driver-portal-sct" class="driver-portal-sct">
            <?php
            foreach($result as $row) {
                $rideId = $row["id"];
                echo '<details><summary>';
                echo ' <p><span>';
                echo $row["name"] . "</span> needs a ride to<span> ";
                echo $row["phonenumber"] . "<i class='expand fa-solid fa-circle-info'></i></span></p><br><span class='start-l' id='startL'>";
                echo $row["start_location"] . "</span><br><span class='end-l' id='endL'>";
                echo $row["end_location"] . "</span><br><span class='ride-id' id='ride-id'>";
                echo $rideId . "</span></summary>";
                
                echo ' <p>From<span> [Somewhere]</span></p>
                <p>To <span> [Somehwere]</span></p>
                <button class="accept" id="accept">Accept</button>
                <button class="ignore-btn">Ignore</button>
                <button class="seeonmap-btn">See on map</button></details>';
            }
            ?>
        </section>
        <div class="status">
            <button class="btn-status-unavailable" id="btn-status">Busy</button>
        </div>
        </div>
    </main>

    <script src="../script.js"></script>
    <script src="portal.js"></script>
</body>

</html>