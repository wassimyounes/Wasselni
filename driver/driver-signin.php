<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wasselni | driver home</title>
  <link rel="stylesheet" href="../css/driver.css">
</head>

</style>

<body>
  <header>
    <a href="driver-index.html">
      <div class="logo"><span>W</span>asselni</div>
    </a>
    <ul>
      <a href="driver-index.html"><img src="../images/back-arrow.png" alt=""></a>
    </ul>
  </header>
  <main>
    <section>
      <p> Sign in as a driver</p>
      <?php 
      if(isset($_SESSION["error"])) {
        echo "<p class='signin-error'>Wrong Email or Password</p>";
        unset($_SESSION["error"]);
      }
      ?>
      <form action="../services/driver-signin-service.php" method="post">
        <input type="email" id="username" name="email" placeholder="Email" required autocomplete="off">
        <input type="password" id="password" name="password" required placeholder="Password"  autocomplete="off"><br><br>

        <div class="button">
          <button class="btn-driver" type="submit">Sign In</button>
        </div>
      </form>
      <div class="button">
        <a href="driver-forgot-pass.html" ><u type="submit">Forgot Password?</u></a>
      </div>
    </section>
  </main>
</body>

</html>

