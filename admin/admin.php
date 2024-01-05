<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard Wasselni</title>
	<script src="https://kit.fontawesome.com/d7d12ce728.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="admin.css">
</head>

<body>
	<header>
		<div><span><i id= "dashes" class="fa-solid fa-bars"></i></span>Admin</div>
		<div>log in</div>
	</header>
	<main>
	<aside>
		<ul>
			<li>Admin</li>
			<li>Users</li>
			<li>Drivers</li>
			<li>Reports</li>
			<li>Statistics</li>
			<li>Tracks</li>
			<li>Vehciles</li>
			<li>payments</li>
			<li>Blogs</li>
			<li>Events</li>
		</ul>
	</aside>
	<section>
		<?php

		echo "<table>";
		echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>email</th><th>phone number</th><th>body type</th><th>car make</th><th>year</th><th>license plate</th></tr>";

		class TableRows extends RecursiveIteratorIterator {
		function __construct($it) {
			parent::__construct($it, self::LEAVES_ONLY);
		}

		function current() {
			return "<td>" . parent::current(). "</td>";

		}

		function beginChildren() {
			echo "<tr>";
		}

		function endChildren() {
			echo "<td><button>confirm</button></td>";
			echo "</tr>" . "\n";
		}

		}


		require_once("../database/connect.php"); 



		try {

		$stmt = $conn->prepare("SELECT drivers.id, drivers.firstname, drivers.lastname, drivers.email, drivers.phonenumber, vehicle_info.vehicle_type, vehicle_info.vehicle_make, vehicle_info.year, vehicle_info.license_plate
		FROM drivers
		JOIN vehicle_info ON drivers.id = vehicle_info.driver_id WHERE is_confirmed = 0");

		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			echo $v;
		}
		
		
		} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
		}
		$conn = null;
		echo "</table>";
	?>
		

	</section>
</main>
<script src="confirm.js"></script>
<script>
	const dashes = document.getElementById("dashes")
	const sideBar = document.querySelector("aside")
	dashes.addEventListener("click", () => {
		sideBar.classList.toggle("aside-hidden");
	})
	document.querySelectorAll("button").forEach((btn) => {
		btn.addEventListener("click", () => {
			setTimeout(() => {
				location.reload();
			}, 1800)

		})
	} )
</script>
</body>

</html>