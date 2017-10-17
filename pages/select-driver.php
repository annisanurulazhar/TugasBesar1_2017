<!DOCTYPE html>
<html>
	<head>
		<title>
			Order Ojek
		</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles/select-driver.css">
	</head>
	<body>
		 <?php
			include '../handlers/config.php';

			// Check connection
			if ($conn->connect_error) {
   			die("Connection failed: " . $conn->connect_error);
			}

			$id = $_GET['id_active'];

			$pick = $_POST['picking-point'];

			$dest = $_POST['destination'];

			$sql_user = "SELECT username, nama_lengkap, email, no_hp, is_driver, photo FROM penumpang WHERE user_id= $id ";

			$sql_driver = "SELECT user_id FROM preferred_location WHERE preferred_loc = $pick OR preferred_loc = $dest ";

			$sql_rating = "SELECT user_id, AVG(rating_num) AS rating_avg FROM rating GROUP BY user_id";	

			$sql_count = "SELECT user_id, COUNT(rating_num) AS rating_count FROM rating GROUP BY user_id";		

			$result_user = $conn->query($sql_user);

			$result_driver = $conn->query($sql_driver);

			$result_rating = $conn->query($sql_rating);	

			$result_count = $conn->query($sql_count);

			$row_user = $result_user->fetch_assoc();

			$username = $row_user["username"];
			$fullname = $row_user["nama_lengkap"];
			$email = $row_user["email"];
			$no_hp = $row_user["no_hp"];
			$is_driver = $row_user["is_driver"];
			$url_photo = "../" . $row_user["photo"].$username.".png";
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
					<div class="tabitem1"><a href="#order">ORDER</a></div>
					<div class="tabitem2"><a href="history-order.php">HISTORY</a></div>
					<div class="tabitem3"><a href="profile.php">MY PROFILE</a></div>
				</div>
				<div class="menu-container">
					<div class="menu-title">MAKE AN ORDER</div>
				</div>
				<div class="content-container">
					<div class="tab-order">
						<div class="select-dest">
							<div class="number">1</div>	
							<a href="#order">Select Destination</a>
						</div>
						<div class="padding-tab"></div>
						<div class="select-driver">
							<div class="number">2</div>
							<a href="#select-driver">Select a Driver</a>
						</div>
						<div class="padding-tab"></div>
						<div class="complete">
							<div class="number">3</div>
							<a href="complete">Complete your order</a>
						</div>
					</div>
					<div class="pref-drivers">
						<div class="text-pref-drivers">PREFERRED DRIVERS</div>
						<?php
							if ($_POST["pref-driver"]==""){
							echo "<span class='no-drivers'><div class='no-drivers'>Nothing to display :(</div></span>";
							}
							else{
								while($row_rating = mysqli_fetch_array($result_rating)){
									echo $row_rating['user_id']." ";
									echo $row_rating['rating_avg']." ";
								}
							}
						?>
					</div>
					<div class="list-drivers">
						<div class="text-list-drivers">OTHER DRIVERS</div>
						<div class="list">
								<?php  
									while($row_rating = mysqli_fetch_array($result_rating)){
										$row_count = mysqli_fetch_array($result_count);
										$id_driver = $row_rating['user_id'];
										echo "<span class='content-foto'><div class='content-foto'><img class = 'img-circle' src=", $url_photo, " height='100px' width='100px'><span class='content-desc'><div class='content-desc'><span class='fullname'><div class='fullname'>",$fullname,"</div></span><span class='rating'><div class='rating'><span class='star'><div class='star'><img class = 'img-star' src='../assets/icon/star-fill.png' height='10px' width='10px'></div></span><span class='rating-avg'><div class='rating-avg'>",round($row_rating['rating_avg'],2), " (",$row_count['rating_count']," voters)","</div></span></div></span><span class='button-choose'><div class='button-choose'><button class='button' onClick='choose()'>I Choose You!</button></div></span></div></span></div></span>";

									}
								?>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			function choose() {
   				document.location.href = "complete-order.php?id_active=<?php echo $id ?>&id_driver=<?php echo $id_driver ?>";
			}
		</script>
	</body>
</html>