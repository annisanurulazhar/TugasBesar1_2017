<?php
	include '../handlers/config.php';
	$id = $_GET["id_active"];
	$sql = "SELECT * FROM order_ojek 
			NATURAL JOIN rating NATURAL JOIN penumpang 
			WHERE $id=order_ojek.user_id";

	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$fullname = $row["nama_lengkap"];
		$username = $row["username"];
	}
?> 
		
<!DOCTYPE html>
<html>
	<head>
		<title>
			History
		</title>
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
						<div class="logout">
							<a href="../handlers/logout-handler.php>">Logout</a></div>
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
					<div class="tabitem4"><a href="history-order.php?id_active=<?php echo $id ?>">MY PREVIOUS ORDER</a></div>
					<div class="tabitem5"><a href="history-driver.php?id_active=<?php echo $id ?>">DRIVER HISTORY</a></div>
				</div>
				<div class="container" id="box1">
					<img class="image" src="<?php echo $url_photo ?>">
					<div class="konten">
						<?php
							$result = $conn->query($sql);
							$index = 0;
							if (mysqli_num_rows($result) > 0) {
								while ($row = $result->fetch_assoc()) {
									$sql = "SELECT * FROM order_ojek JOIN rating JOIN penumpang WHERE $id=order_ojek.user_id AND order_ojek.driver_id=penumpang.user_id";
									echo '<div class="date">'.$row['time'].' </div>';
									echo '<div class="name">'.$row['nama_lengkap'].'</div>';
									echo '<div class="path">'.$row['picking_location'].' - '.$row['destination'].'</div>';
									echo '<button class="button" onclick="hideContainer('. $index . ')">HIDE</button>';
									echo '<div class="rating">You rated:';
										for($x = 0; $x < $row['rating_num']; $x++) {
											echo '<i class="material-icons">star_border</i>';
										} 
										echo '</div>';
									echo '<div class="comment">You commented: '.$row['comments'].'</div>';
									$index++;
								}
							}
							$conn->close();
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>