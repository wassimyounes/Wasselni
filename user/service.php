<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d7d12ce728.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Wasselni</title>
</head>

<body onload = "initWatch()">
    <div id="side-bar" class="side-bar">
        <img class="close" id="close" src="../images/close.png" alt="">
        <ul>
            <a href="signin.html">
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
                    <a href="signin.html"><li>Account</li></a>
                    <li>Contact us</li>
                    <li>FAQ</li>
                    <li>Places</li>
                    <li>Services</li>
                </ul>
            </div>
        </ul>
    </header>
    <main>
        </div>
        <section class="trip-header">
            <div class="trip-information">Trip information</div>
            <div id="status"></div>
        </section>
        <section class="booking-section">
            <div class="from-to">
                <div class="points">
                    <p>Leaving from</p>
                    <p id="fromLoc"></p>
                </div>
                <div class="points">
                    <p>Going to</p>
                    <p id="toLoc"></p>
                </div>
                <div class="points driver-info">
                    <p>Driver's name</p>
                    <p id="driver-name"> --------</p>
                </div>
                <div class="points driver-info">
                    <p>Driver's phone number</p>
                    <p id="driver-phone"> --------</p>
                </div>
            </div>
           
        </section>
    </main>


    <script src="../script.js"></script>
    <script src="watch-status.js"></script>

</body>

</html>