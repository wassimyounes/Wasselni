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
        <img class="app-img map-img-no-animation phone-img pass-img pass-img" src="../images/password.png" alt="phone">
        
        <section>
            <div class="hero1">
                <p class="no-cursive">Great!</p>
                <p class="no-cursive">Now please choose a memorable password</p>
            </div>

        </section>
        <form class="form" action="../services/user-signup-service.php" method="post">
            <p id="code-alert" ></p>
            <input type="text" class="input-field" id="password" name="password" placeholder="Password" required autocomplete="off">
            <input type="text" class="input-field" id="confirmPassword" placeholder="Confirm password" required autocomplete="off">
            <button id="set-pass-btn" class="btn-1">Sign up</button>
        </form>

    </main>
    <script>
        let submitBtn = document.getElementById("set-pass-btn");
        submitBtn.addEventListener("click", () => {

            const firstInpt = document.getElementById("password");
            const secondInpt = document.getElementById("confirmPassword");
            if(firstInpt.value == secondInpt.value) {
                document.querySelector("form").submit();
            } 
            else {
                document.querySelector("form").addEventListener("submit", (e => {
                    e.preventDefault();
                }))
                document.getElementById("code-alert").textContent = "Passwords should match";
            }
            
        })

    </script>
</body>

</html>