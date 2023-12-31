<?php
session_start();
if(isset($_SESSION["name"])) {
    header("location: welcome.php");
    exit();
}
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
        <a href="start.html"><div class="logo"><span>W</span>asselni</div></a>
        <ul>
            <a class="bk-arrow" href="../index.html"><img src="../images/back-arrow.png" alt="" ></a>
            <div id="nav-bar" class="nav-bar">
                <ul>
                    <a href="signin.php"><li class="active">Sign in</li></a>
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
        <img class="app-img map-img-no-animation signin-img" src="../images/signin.png" alt="phone">
        
        <section>
            <div class="hero1">
                <p class="no-cursive">Sign in to book your ride</p>

            </div>
        </section>
        <form class="form" action="../services/user-login-service.php" method="POST">
        <?php
            if(isset($_GET["error"]) && $_GET["error"] === "2") {
                echo "<p style='color: red; text-align: center; margin-top: -33px'> Phone number already exists, try to sign in</p>";
            }
            if(isset($_SESSION["error"])) {
                echo "<p style='color: red; text-align: center; margin-top: -33px'> Wrong Credentials</p>";
            }

            ?>
            <input type="tel" name="phone" class="input-field" placeholder="Phone number" >
            <input type="text" name="password" class="input-field" placeholder="Password" >
            <a><button class="btn-1">Submit</button></a>
        </form>
        <a href="forgot-password.html"><button class="btn-1">forgot password?</button></a>
    </main>

    <script src="../script.js"></script>
</body>

</html>