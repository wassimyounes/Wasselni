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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
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
                echo '<details class="info-cards"><summary>';
                echo ' <p><span>';
                echo "Ride Request from <span style='font-size: 20px; color: blue;'> ";
                echo $row["name"] . "<i class='expand fa-solid fa-circle-info'></i></span></p><br><span class='start-l' id='startL'>";
                echo $row["start_location"] . "</span><br><span class='end-l' id='endL'>";
                echo $row["end_location"] . "</span><br><span class='ride-id' id='ride-id'>";
                echo $rideId . "</span></summary>";
                echo ' <p>Pickup: <span style="font-size:16px;color:blue" class="from-loc"></span></p>
                       <p>Drop: <span style="font-size:16px;color:blue" class="to-loc"></span></p>
                       <p>Estimated distance: <span style="font-size:16px;color:blue" class="distance"></span></p>
                       <p>Estimated Time: <span style="font-size:16px;color:blue" class="time"></span></p>
                       <br>
                       <button class="accept" id="accept">Accept</button>
                       <button class="ignore-btn">Ignore</button>
                       <button class="seeonmap-btn">See on map</button></details>';
            }
            ?>
        </section>



                <!-- trip info -->
            <div  id="trip-info" class="trip-info-driv">
            <div class="down-arrow" id="down-arrow"alt=""><i class="fa-solid fa-x"></i></div>

            </br>
              
            <div id="map"></div>
        </div>

    </main>
    <script src="../maps-and-geocodes/geocodes-driver.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="../maps-and-geocodes/map-driver.js"></script>
    <script src="../script.js"></script>
    <script src="portal.js"></script>
</body>

</html>