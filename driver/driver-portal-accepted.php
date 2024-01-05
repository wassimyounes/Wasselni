<?php
session_start();
if(isset($_SESSION["driver_id"]) && isset($_SESSION["driver_name"]));
require_once("../database/connect.php");
$id = $_SESSION["ride-id"];
$stmt = $conn->prepare("SELECT rides.id, rides.start_location, rides.end_location, rides.status, users.name, users.phonenumber FROM rides JOIN users ON users.id = rides.user_id WHERE rides.id = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$rideId = $row["id"];
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
        <div class="prof">
        <p><?php echo $_SESSION["driver_name"] . "<br>";?> </p>
        <p><i class="fa-solid fa-gear fa-lg"></i></p>

        </div>
        <section id="driver-portal-sct" class="driver-portal-sct">
            <?php
                echo '<div class="card"><p>';
                echo "Passenger's name: " . "<span>" . $row["name"] . "</span></p><p> ";
                echo "Passenger's phone number: " . "<span>" . $row["phonenumber"] . "</span></p><p>" ;
                echo "Pick-up: " . "<span id='pick-up'></span></p><p>";
                echo "Destination: " . "<span id='drop'></span></p><p>";
                echo "Reference: " .  "<span id='ride-id'>" . $rideId . "</span></p>
                <button class='start' id='start'>Start</button>";
            ?>
        </section>
    </main>

    <script src="../script.js"></script>
    <script src="accept.js"></script>
    <script>
    window.onload = () => {
        const pickUp = localStorage.getItem("start");
        const drop = localStorage.getItem("end");
        document.getElementById("pick-up").innerHTML = pickUp
        document.getElementById("drop").innerHTML = drop
        console.log(pickUp)
        console.log(drop)
    }

    </script>
</body>

</html>