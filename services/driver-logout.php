<?php 
if($_SERVER["REQUEST_METHOD"] === "POST") {
    session_unset();
    session_destroy();
    header("location: ../driver/driver-index.html");
}
