
<?php 

require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();


$receivedConfirmationToken = $_GET["token"];
list($receivedSecretKey, $receivedHmac) = explode("|", $receivedConfirmationToken);
list($x, $r_id, $y) = explode("2", $receivedSecretKey);
$secretKey = $_ENV["SECRET_KEY1"] . $r_id . $_ENV["SECRET_KEY2"];
$inspectedHmac = hash_hmac("sha256", $receivedSecretKey, $receivedSecretKey);


if ($inspectedHmac === $receivedHmac) {
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

        $password = $_POST["password"];
        // echo $password;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // echo "hashed password: " . $hashedPassword;

        require_once("../database/connect.php");
        $stmt =  $conn->prepare("UPDATE drivers SET password = ? WHERE id = ?");
        $stmt->execute([$hashedPassword, $r_id]);
        // echo "submitted";
        $conn = null;
        header("location: driver-signin.html");
        exit();
    }
?>