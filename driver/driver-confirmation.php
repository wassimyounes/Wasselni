
<?php 


$receivedConfirmationToken = $_GET["token"];
list($receivedSecretKey, $receivedHmac) = explode("?", $receivedConfirmationToken);
// echo "received conf token: " . $receivedConfirmationToken . "<br>";
// echo  "received secret key: " . $receivedSecretKey . "<br>";
// echo "received hMAC: " . $receivedHmac . "<br>";
list($r_token, $r_id) = explode("|", $receivedSecretKey);
// echo "received token: " . $r_token . "<br>";
// echo "received id: " . $r_id . "<br>";
$secretKey = $r_token . "|" . $r_id;
// echo "secret key: " . $secretKey . "<br>";
$inspectedHmac = hash_hmac("sha256", $receivedSecretKey, $r_token);
// echo "received Hmac: " . $receivedHmac . "<br>";
// echo "inspected Hmac: " . $inspectedHmac . "<br>";


if ($receivedHmac === $inspectedHmac) {
    echo '<!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Wasselni | driver home</title>
      <link rel="stylesheet" href="../css/driver.css">
    </head>
    <body>
      <header>
          <div class="logo"><span>W</span>asselni</div>
      </header>
      <main>
        <section>
          <p style="font-size: 20px;"> Please assign a password</p>
          <form id="set-dri-pass" action="" method="post">
            <input type="text" id="password" name="password" placeholder="Set password" required autocomplete="off">
            <input type="text" id="confirm-password" placeholder=" Confirm password" required autocomplete="off" ><br><br>
            <div class="button">
              <button class="btn-driver" type="submit">Submit</button>
              <p class="pass-conf-notif"></p>
            </div>
          </form>
        </section>
      </main>
      <script>
          const setPassDriverForm = document.getElementById("set-dri-pass");
          setPassDriverForm.addEventListener("submit", (e) => {
            const password = document.getElementById("password").value.trim();
            const confirmPassword = document.getElementById("confirm-password").value.trim();
            if(password !== ""  &&  password === confirmPassword  && /^\S+$/.test(password)) {
              document.querySelector(".pass-conf-notif").innerHTML = "";
            } 
            else {
              document.querySelector(".pass-conf-notif").innerHTML = "Non matching passwords";
              e.preventDefault();
            }
          });
      </script>
    </body>
    </html>';
} else {
   echo "Unauthorized access";
}

?>


<?php 

    if(isset($_POST["password"])) {
      require_once("../database/connect.php");
        $password = $_POST["password"];
        // echo $password;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // echo "hashed password: " . $hashedPassword;


        $stmt =  $conn->prepare("UPDATE drivers SET password = ? WHERE id = ?");
        $stmt->execute([$hashedPassword, $r_id]);
        // echo "submitted";
        $conn = null;
        header("location: driver-signin.php");
        exit();
    }
?>