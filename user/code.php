<?php 
session_start();

if(!isset($_SESSION["from_server"])) {
    header("location: start.html");
    exit();
}
unset($_SESSION["from_server"])
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Wasselni</title>
</head>

<body>
    <header>
        <a href="../index.html"><div class="logo"><span>W</span>asselni</div></a>
        <ul>
            <a class="bk-arrow" href="start.html"><img src="../images/back-arrow.png" alt="" ></a>
            <div id="nav-bar" class="nav-bar">
                <ul>
                    <a href="signin.html"><li>Sign in</li></a>
                    <li>Contact us</li>
                    <li>FAQ</li>
                    <li>Places</li>
                    <li>Services</li>
                    <a href="../driver/driver-index.html"><li class="driver-option" >Drive with us</li></a>
                </ul>
            </div>
        </ul>
    </header>
    <main>
        </div>
        <img class="map-img map-img-no-animation" src="../images/haze-map.png" alt="map">
        <img class="app-img map-img-no-animation" src="../images/app.png" alt="app">
        <img style="width: 120px; top: 100px; width: 70px;" class="app-img map-img-no-animation phone-img" src="../images/sms.png" alt="sms">
        
        <section >
            <div class="hero1">
                <p class="no-cursive">We've just sent you a code by SMS</p>
                <p class="no-cursive">Please enter the code below</p>
            </div>
        </section>
        <form class="form" action="../services/user-signup-service.php" method="post">
            <div class="sms-code">
                <input type="text" class="code" name="received-verification-code" required>
            </div>
            <?php
            if(isset($_GET["error"]) && $_GET["error"] === "1") {
                echo "<p style='color: red; text-align: center; margin-top: -33px'> Invalid code </p>";
            }
            ?>
            <button class=" btn">Submit</button>
        </form>

    </main>

    <script src="../script.js"></script>
</body>

</html>
