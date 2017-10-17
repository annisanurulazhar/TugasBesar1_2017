<!DOCTYPE html>
<html>
	<head>
		<title>
			Order Ojek
		</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles/complete-order.css">
	</head>
	<body>
		 <?php

		 	$id = $_GET['id_active'];
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "ojekonline";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $database);

			$sql = "SELECT username, nama_lengkap, email, no_hp, is_driver, photo FROM penumpang WHERE user_id= $id";

			$result = $conn->query($sql);

			$row = $result->fetch_assoc();

			$username = $row["username"];
			$fullname = $row["nama_lengkap"];
			$email = $row["email"];
			$no_hp = $row["no_hp"];
			$is_driver = $row["is_driver"];
			$url_photo = "../" . $row["photo"];


		// Check connection
			if ($conn->connect_error) {
   			die("Connection failed: " . $conn->connect_error);
		}

		?> 
		<div class="flex-container">
			<div id="container" class="flex-container container"> 
				<div id="header" class="header">
					<div class="projekcontainer">
						<div class="projek">
							<h2>
								<span style="color: green">PR</span><span style="color: black">-</span><span style="color: red">OJEK</span>
							</h2>
						</div>
						<div class="slogan">wushh... wushh... ngeeeeeenggg</div>
					</div>
					<div class="projekcontainer">
						<div class="username">Hi, <?php echo $username; ?></div>
						<div class="logout">
							<a href="../handlers/logout-handler.php">Logout</a></div>
					</div>
				</div>
				<div class="tab">
					<div class="tabitem1"><a href="order-ojek.php?id_active=<?php echo $id ?>">ORDER</a></div>

					<div class="tabitem2"><a href="history-order.php?id_active=<?php echo $id ?>">HISTORY</a></div>
					
					<div class="tabitem3"><a href="profile.php?id_active=<?php echo $id ?>">MY PROFILE</a></div>
				</div>
				<div class="menu-container">
					<div class="menu-title">MAKE AN ORDER</div>
				</div>
				<div class="content-container">
					<div class="tab-order">
						<div class="select-dest">
							<div class="number">1</div>	
							<a href="order-ojek.php?id_active=<?php echo $id ?>">Select Destination</a>
						</div>
						<div class="padding-tab"></div>
						<div class="select-driver">
							<div class="number">2</div>
							<a href="select-driver.php?id_active=<?php echo $id ?>">Select a Driver</a>
						</div>
						<div class="padding-tab"></div>
						<div class="complete">
							<div class="number">3</div>
							<a href="complete-order.php?id_active=<?php echo $id ?>">Complete your order</a>
						</div>
					</div>
					<div class="head-content">HOW WAS IT?</div>
					<div class="content">
						<div class="content-foto">
							<img class = "img-circle" src="<?php echo $url_photo ?>" height="100px" width="100px">
						</div>
						<div class="content-username">@<?php echo $username; ?></div>
						<div class="content-fullname"><?php echo $fullname; ?></div>
						<div class="content-rating">
							<div class="star-unfill">
								<img class = "img-star" id="img1" onclick="rating1()" src="../assets/icon/star-unfill.png">
							</div>
							<div class="star-unfill">
								<img class = "img-star" id="img2" onclick="rating2()" src="../assets/icon/star-unfill.png">
							</div>					
							<div class="star-unfill">
								<img class = "img-star" id="img3" onclick="rating3()" src="../assets/icon/star-unfill.png">
							</div>					
							<div class="star-unfill">
								<img class = "img-star" id="img4" onclick="rating4()" src="../assets/icon/star-unfill.png">
							</div>					
							<div class="star-unfill">
								<img class = "img-star" id="img5" onclick="rating5()" src="../assets/icon/star-unfill.png">
							</div>					
						</div>
					</div>
					<form class="content-comment">
						<textarea name="comment" class="comment" placeholder="Your comment..."></textarea>
					</form>
					<div class="button-complete">
						<button class="but-complete">Complete Order</button>
					</div>					
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		function rating1() {
			document.getElementById("img1").src = "../assets/icon/star-fill.png";
			document.getElementById("img2").src = "../assets/icon/star-unfill.png";
			document.getElementById("img3").src = "../assets/icon/star-unfill.png";
			document.getElementById("img4").src = "../assets/icon/star-unfill.png";
			document.getElementById("img5").src = "../assets/icon/star-unfill.png";
		}

		function rating2() {
			document.getElementById("img1").src = "../assets/icon/star-fill.png";
			document.getElementById("img2").src = "../assets/icon/star-fill.png";
			document.getElementById("img3").src = "../assets/icon/star-unfill.png";
			document.getElementById("img4").src = "../assets/icon/star-unfill.png";
			document.getElementById("img5").src = "../assets/icon/star-unfill.png";
		}

		function rating3() {
			document.getElementById("img1").src = "../assets/icon/star-fill.png";
			document.getElementById("img2").src = "../assets/icon/star-fill.png";
			document.getElementById("img3").src = "../assets/icon/star-fill.png";
			document.getElementById("img4").src = "../assets/icon/star-unfill.png";
			document.getElementById("img5").src = "../assets/icon/star-unfill.png";
		}

		function rating4() {
			document.getElementById("img1").src = "../assets/icon/star-fill.png";
			document.getElementById("img2").src = "../assets/icon/star-fill.png";
			document.getElementById("img3").src = "../assets/icon/star-fill.png";
			document.getElementById("img4").src = "../assets/icon/star-fill.png";
			document.getElementById("img5").src = "../assets/icon/star-unfill.png";
		}

		function rating5() {
			document.getElementById("img1").src = "../assets/icon/star-fill.png";
			document.getElementById("img2").src = "../assets/icon/star-fill.png";
			document.getElementById("img3").src = "../assets/icon/star-fill.png";
			document.getElementById("img4").src = "../assets/icon/star-fill.png";
			document.getElementById("img5").src = "../assets/icon/star-fill.png";
		}
	</script>
</html>