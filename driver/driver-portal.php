<?php
session_start();

// echo $_SESSION["driver_id"] . "<br>";
// echo $_SESSION["driver_name"]  . "<br>";
// echo $_SESSION["driver_email"]  . "<br>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wasselni | driver portal</title>
    <script src="https://kit.fontawesome.com/d7d12ce728.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/driver.css">
</head>

<body>
    <header style="padding-top: 4px">
        <a href="driver-index.html">
            <div class="logo"><span>W</span>asselni</div>
        </a>
        <ul>
            <form action="../services/driver-logout.php" method="post">
            <button class="logout-btn"><i class="fa-solid fa-right-from-bracket fa-xl"></i></button>
            </form>
        </ul>
    </header>
    <main>
        <div class="unavailable-screen">
        Make yourself available to view requests</div>
        <div class="prof">
        <p><?php echo $_SESSION["driver_name"] . "<br>";?> </p>
        <p><i class="fa-solid fa-gear fa-lg"></i></p>

        </div>
        <section id="driver-portal-sct" class="driver-portal-sct">
            <details class="request-card">
                <summary>
                    <p><span>[someone]</span> needs a ride to<span>[Location]</span></p>
                </summary>
                <p>From<span> [Somewhere]</span></p>
                <p>To <span> [Somehwere]</span></p>
                <button class="accept">Accept</button>
                <button class="ignore-btn">Ignore</button>
                <button class="seeonmap-btn">See on map</button>
            </details>
            <details class="request-card">
                <summary>
                    <p><span>[someone]</span> needs a ride to<span>[Location]</span></p>
                </summary>
                <p>From<span> [Somewhere]</span></p>
                <p>To <span> [Somehwere]</span></p>
                <button class="accept">Accept</button>
                <button class="ignore-btn">Ignore</button>
                <button class="seeonmap-btn">See on map</button>
            </details>
            <details class="request-card">
                <summary>
                    <p><span>[someone]</span> needs a ride to<span>[Location]</span></p>
                </summary>
                <p>From<span> [Somewhere]</span></p>
                <p>To <span> [Somehwere]</span></p>
                <button class="accept">Accept</button>
                <button class="ignore-btn">Ignore</button>
                <button class="seeonmap-btn">See on map</button>
            </details>
            <details class="request-card">
                <summary>
                    <p><span>[someone]</span> needs a ride to<span>[Location]</span></p>
                </summary>
                <p>From<span> [Somewhere]</span></p>
                <p>To <span> [Somehwere]</span></p>
                <button class="accept">Accept</button>
                <button class="ignore-btn">Ignore</button>
                <button class="seeonmap-btn">See on map</button>
            </details>
            <details class="request-card">
                <summary>
                    <p><span>[someone]</span> needs a ride to<span>[Location]</span></p>
                </summary>
                <p>From<span> [Somewhere]</span></p>
                <p>To <span> [Somehwere]</span></p>
                <button class="accept">Accept</button>
                <button class="ignore-btn">Ignore</button>
                <button class="seeonmap-btn">See on map</button>
            </details>
            <details class="request-card">
                <summary>
                    <p><span>[someone]</span> needs a ride to<span>[Location]</span></p>
                </summary>
                <p>From<span> [Somewhere]</span></p>
                <p>To <span> [Somehwere]</span></p>
                <button class="accept">Accept</button>
                <button class="ignore-btn">Ignore</button>
                <button class="seeonmap-btn">See on map</button>
            </details>
            <details class="request-card">
                <summary>
                    <p><span>[someone]</span> needs a ride to<span>[Location]</span></p>
                </summary>
                <p>From<span> [Somewhere]</span></p>
                <p>To <span> [Somehwere]</span></p>
                <button class="accept">Accept</button>
                <button class="ignore-btn">Ignore</button>
                <button class="seeonmap-btn">See on map</button>
            </details>


        </section>
        <div class="status">
            <p>Status</p>
            <button class="btn-status-available" id="btn-status">Available</button>
        </div>
        </div>
    </main>

    <script src="../script.js"></script>
</body>

</html>