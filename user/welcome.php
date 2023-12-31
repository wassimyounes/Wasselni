<?php
session_start();
if(!isset($_SESSION["name"])) {
    header("location: start.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d7d12ce728.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css"/>
    <link rel="stylesheet" href="../css/style.css">
    <title>Wasselni</title>
</head>

<body>
    <div id="side-bar" class="side-bar">
        <img class="close" id="close" src="../images/close.png" alt="">
        <ul>
            <a href="account.php">
                <li>Account</li>
            </a>
            <li>Contact us</li>
            <li>FAQ</li>
            <li>Places</li>
            <li>Services</li>
        </ul>
    </div>
    <header>
        <a href="../index.html">
            <div class="logo"><span>W</span>asselni</div>
        </a>
        <ul>
            <img src="../images/hamburger.png" alt="" id="back">
            <div id="nav-bar" class="nav-bar">
                <ul>
                    <a href="account.php">
                        <li>Account</li>
                    </a>
                    <li>Contact us</li>
                    <li>FAQ</li>
                    <li>Places</li>
                    <li>Services</li>
                    <a href="../driver/driver-index.html">
                        <li class="driver-option">Drive with us</li>
                    </a>
                </ul>
            </div>
        </ul>
    </header>
    <main>
        </div>
        <img class="map-img map-img-no-animation" src="../images/haze-map.png" alt="map">
        <img class="app-img map-img-no-animation" src="../images/app.png" alt="app">

        <section>
            <div class="hero1">
                <p class="no-cursive">Good day, <span style="text-transform: capitalize;"><?php echo $_SESSION["name"]?></span></p>
                <p style="font-size: 16px;" class="no-cursive">let's manage your trip</p>
            </div>
        </section>
        <form class="form">
            <div class="destination">
            <input type="text" class="input-field" id="pickup-location" placeholder="Pick up" required autocomplete="off"> 
            <a class="my-location" id="my-location" title="my location"><i class="fa-solid fa-location-dot fa-bounce fa-2xl"></i></a> 
            <div id="suggestions-pickup" ></div>
            </div>
            <input type="text" class="input-field" id="drop-location" placeholder="Destination" required autocomplete="off"> 
            <div id="suggestions-drop" ></div>
        </form>
        <button id="lets-go" class="btn-1" onclick="measureDistance()" >Let's go</button>
        <div id="alert-input"></div>
        <!-- trip info -->
        <div id="trip-info" class="trip-info">
            <img class="down-arrow" id="down-arrow" src="../images/back-arrow.png" alt="">

            </br>
            <!-- trip distance time and fare -->
            <div id="trip-dtf" class="trip-dtf">  
                <i id="trip-icon" class="fa-solid fa-lg fa-bars"></i>
                <p style="display: none;" id="fCoords"></p>
                <p style="display: none;" id="tCoords"></p>
                <p id="distance"></p>
                <p id="time"></p>
                <p id="fare"></p>

            </div>

            <div id="map"></div>
        </div>
    </main>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="../maps-and-geocodes/geocodes.js"></script>
    <script src="../maps-and-geocodes/map.js"></script>
    <script src="../script.js"></script>
</body>

</html>