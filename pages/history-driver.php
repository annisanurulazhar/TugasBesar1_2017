<?php
	include '../handlers/config.php';
	$id = $_GET["id_active"];
	$sql = "SELECT nama_lengkap, picking_location, destination, photo, time, rating_num, comments FROM order_ojek JOIN rating JOIN penumpang WHERE $id=order_ojek.driver_id AND order_ojek.user_id=penumpang.user_id";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$fullname = $row["nama_lengkap"];
	$url_photo = "../" . $row["photo"];

	$date = $row["time"];
	$picklocation = $row["picking_location"];
	$destination = $row["destination"];

	$comment = $row["comments"];
	$rating = $row["rating_num"];

	$conn->close();
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>
			History
		</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles/profile.css">
		<link rel="stylesheet" type="text/css" href="../assets/styles/history.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="../assets/js/history.js"></script>
	</head>
	<body>
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
						<div class="logout">Logout</div>
					</div>
				</div>
				<div class="tab">
					<div class="tabitem1"><a href="order-ojek.php?id_active=<?php echo $id ?>">ORDER</a></div>
					<div class="tabitem2"><a href="history-order.php?id_active=<?php echo $id ?>">HISTORY</a></div>
					<div class="tabitem3"><a href="profile.php?id_active=<?php echo $id ?>">MY PROFILE</a></div>
				</div>
				<div class="menu-container">
					<div class="menu-title">TRANSACTION HISTORY</div>
				</div>
				<div class="tab">
					<div class="tabitem5"><a href="#history-order">MY PREVIOUS ORDER</a></div>
					<div class="tabitem4"><a href="#history-driver">DRIVER HISTORY</a></div>
				</div>
				<div class="container" id="box1">
					<img class="image" src="<?php echo $url_photo ?>">
					<div class="konten">
						<div class="date">Tanggal<?php echo $date?></div>
						<div class="name">Nama<?php echo $fullname?></div>
						<div class="path">Asal<?php echo $picklocation?> - <?php  echo $destination?>Tujuan </div>
						<button class="button" onclick="hideContainer('box1')">HIDE</button>
						<div class="rating">gave <?php echo $rating?> stars for this order
						</div>
						<div class="comment">and left comment: <?php echo $comment?></div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>