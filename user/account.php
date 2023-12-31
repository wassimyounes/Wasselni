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
    <link rel="stylesheet" href="../css/style.css">
    </link>
    <title>Wasselni</title>
</head>

<body style="height: fit-content; overflow-y: auto;" >
    <div id="side-bar" class="side-bar">
        <img class="close" id="close" src="../images/close.png" alt="">
        <ul>
            <a href="account.html">
                <li>Account</li>
            </a>
            <li>Contact us</li>
            <li>FAQ</li>
            <li>Places</li>
            <li>Services</li>
        </ul>
    </div>
    <header style="padding-top: 2px;">
        <a href="../index.html">
            <div class="logo"><span>W</span>asselni</div>
        </a>
        <ul>
            <img src="../images/hamburger.png" alt="" id="back">
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


        <section class="manage-acnt-scn">
            <div class="profile-header">
                <div class="profile-img">
                    <img src="../images/user.png" alt="user-img">
                </div>
                <p class="profile-name"><?php echo $_SESSION["name"]?></p>
                <ul class="profile-set">
                    <li>
                    <form action="../services/user-logout.php" method="post">
            <button class="logout-btn"><i class="fa-solid fa-right-from-bracket fa-xl"></i></button>
            </form>
                    </li>
                </ul>
            </div> <br>
            <div class="user-panel">
                <details>
                    <summary class="not-active">Personal information</summary >
                    <form id="personal-informationopt" action="">
                        <div class="lbl-wrap">
                            <label for="name">Name</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="name" readonly placeholder="someone">
                        <div class="lbl-wrap">
                            <label for="phone-number">Phone number</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="phone-number" readonly placeholder="12345678">
                        <div class="lbl-wrap">
                            <label for="email">E-mail</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="email" readonly placeholder="someone@example.com">
                        <div class="lbl-wrap">
                            <label for="password">Password</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="password" readonly placeholder="********">
                        <div class="lbl-wrap">
                            <label for="home-address">Home address</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="home-address" readonly placeholder="somwhere">
                        <div class="lbl-wrap">
                            <label for="word-address">Work address</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="word-address" readonly placeholder="somwhere">
                    </form>
                </details>
                <details>
                    <summary class="not-active" >Security</summary>
                    <form id="personal-informationopt" action="">
                        <div class="lbl-wrap">
                            <label for="name">Name</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="name" readonly placeholder="someone">
                        <div class="lbl-wrap">
                            <label for="phone-number">Phone number</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="phone-number" readonly placeholder="12345678">
                        <div class="lbl-wrap">
                            <label for="email">E-mail</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="email" readonly placeholder="someone@example.com">
                        <div class="lbl-wrap">
                            <label for="password">Password</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="password" readonly placeholder="********">
                        <div class="lbl-wrap">
                            <label for="home-address">Home address</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="home-address" readonly placeholder="somwhere">
                        <div class="lbl-wrap">
                            <label for="word-address">Work address</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="word-address" readonly placeholder="somwhere">
                    </form>
                </details>
                <details>
                    <summary class="not-active" >Privacy</summary>
                    <form id="personal-informationopt" action="">
                        <div class="lbl-wrap">
                            <label for="name">Name</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="name" readonly placeholder="someone">
                        <div class="lbl-wrap">
                            <label for="phone-number">Phone number</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="phone-number" readonly placeholder="12345678">
                        <div class="lbl-wrap">
                            <label for="email">E-mail</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="email" readonly placeholder="someone@example.com">
                        <div class="lbl-wrap">
                            <label for="password">Password</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="password" readonly placeholder="********">
                        <div class="lbl-wrap">
                            <label for="home-address">Home address</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="home-address" readonly placeholder="somwhere">
                        <div class="lbl-wrap">
                            <label for="word-address">Work address</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="word-address" readonly placeholder="somwhere">
                    </form>
                </details>
                <details>
                    <summary class="not-active" >Credits and points</summary>
                    <form id="personal-informationopt" action="">
                        <div class="lbl-wrap">
                            <label for="name">Name</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="name" readonly placeholder="someone">
                        <div class="lbl-wrap">
                            <label for="phone-number">Phone number</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="phone-number" readonly placeholder="12345678">
                        <div class="lbl-wrap">
                            <label for="email">E-mail</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="email" readonly placeholder="../someone@example.com">
                        <div class="lbl-wrap">
                            <label for="password">Password</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="password" readonly placeholder="********">
                        <div class="lbl-wrap">
                            <label for="home-address">Home address</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="home-address" readonly placeholder="somwhere">
                        <div class="lbl-wrap">
                            <label for="word-address">Work address</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="word-address" readonly placeholder="somwhere">
                    </form>
                </details>
                <details>
                    <summary class="not-active" >Compliants</summary>
                    <form id="personal-informationopt" action="">
                        <div class="lbl-wrap">
                            <label for="name">Name</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="name" readonly placeholder="someone">
                        <div class="lbl-wrap">
                            <label for="phone-number">Phone number</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="phone-number" readonly placeholder="12345678">
                        <div class="lbl-wrap">
                            <label for="email">E-mail</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="email" readonly placeholder="someone@example.com">
                        <div class="lbl-wrap">
                            <label for="password">Password</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="password" readonly placeholder="********">
                        <div class="lbl-wrap">
                            <label for="home-address">Home address</label>
                            <img src="images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="home-address" readonly placeholder="somwhere">
                        <div class="lbl-wrap">
                            <label for="word-address">Work address</label>
                            <img src="../images/edit-field.png" alt="">
                        </div>
                        <input type="text" id="word-address" readonly placeholder="somwhere">
                    </form>
                </details>
            
            </div>
        </section>
    </main>
    <script>
       const summary = document.querySelectorAll('.user-panel details summary').forEach((e) => {
            e.addEventListener('click', ()=> {
                e.classList.toggle("active");
            })
        })
    </script>
    <script src="../script.js"></script>
</body>

</html>