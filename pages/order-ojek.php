<!DOCTYPE html>
<html>
	<head>
		<title>
			Order Ojek
		</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles/order-ojek.css">
	</head>
	<body>
		 <?php
			include '../handlers/config.php';

			// Check connection
			if ($conn->connect_error) {
   			die("Connection failed: " . $conn->connect_error);
			}

			$id = $_GET['id_active'];

			$sql = "SELECT username, nama_lengkap, email, no_hp, is_driver, photo FROM penumpang WHERE user_id= $id ";

			$result = $conn->query($sql);

			$row = $result->fetch_assoc();

			$username = $row["username"];
			$fullname = $row["nama_lengkap"];
			$email = $row["email"];
			$no_hp = $row["no_hp"];
			$is_driver = $row["is_driver"];
			$url_photo = "../" . $row["photo"];
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
						<div class="logout">Logout</div>
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
					<form method="post" id="select-driver" action="select-driver.php?id_active=<?php echo $id ?>">
						<div class="formBox">
							<label class="formAttribute">Picking point</label>
							<input type="text" name="picking-point" class="formFill" id="picking-point" required>
						</div>
						<div class="formBox">
							<label class="formAttribute">Destination</label>
							<input type="text" name="destination"
							class="formFill" id="destination" required>
						</div>
						<div class="formBox">
							<label class="formAttribute">Preferred Driver</label>
							<input type="text" name="pref-driver"
							class="formFill" placeholder="(optional)"
							id="pref-driver">
						</div>		
					</form>
					<div class="button-next">
						<button form="select-driver" type="submit" class="next" value="next">NEXT</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>