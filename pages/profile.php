<?php
			include '../handlers/config.php';

			$id = $_GET['id_active'];

			$sql = "SELECT username, nama_lengkap, email, no_hp, is_driver, photo FROM penumpang WHERE user_id= '$id'";
			$sql1 = "SELECT ROUND(AVG(rating_num), 1) AS avg_rating FROM rating WHERE user_id= '$id' ";

			$result = $conn->query($sql);
			$result1 = $conn->query($sql1);

			$row = $result->fetch_assoc();
			$row1 = $result1->fetch_assoc();

			$url_photo = "../" . $row["photo"];
			$username = $row["username"];
			$fullname = $row["nama_lengkap"];
			$email = $row["email"];
			$no_hp = $row["no_hp"];
			$is_driver = $row["is_driver"];
			$avg_rating = $row1["avg_rating"];	

			echo '<script> var id=' . $id . '</script>';
			echo '<script> var is_driver=' .$is_driver. '</script>';
		?> 
<!DOCTYPE html>
<html>
	<head>
		<title>
			Profile Page
		</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles/profile.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	</head>
	<body>
		 
		<div class="flex-container">
			<div id="container" class="flex-container container"> 
				<div id="header" class="header">
					<div class="projekcontainer">
						<div class="projek">
							<h2>
								<span style="color: rgb(2,112,44)">PR</span><span style="color: black">-</span><span style="color: rgb(213,0,39)">OJEK</span>
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
					<div class="menu-title">MY PROFILE</div>
					<div class="menu-profile-edit-icon" ><img src="../assets/icon-pencil.png" id="icon-edit-profile" height="40px" width="40px" id="icon-edit-profile"></div>
				</div>
				<div class="content-container">
					<div class="content-foto"><img class = "img-circle" src="<?php echo $url_photo ?>" height="100px" width="100px"></div>
					<div class="content-username"><b>@<?php echo $username; ?></b></div>
					<div class="content-fullname"><?php echo $fullname ?></div>
					<div class="content-container2">
						<div class="content-isdriver">
							<?php
								if ($is_driver==false) {
									echo "User";
								} else {
									echo "Driver";
								}
							 ?>
								
							</div>
						<div class="content-rating">
							<?php 
								if($is_driver==true) {
									echo '<i class="material-icons">star_border</i>';
									echo $avg_rating;
								}
						?>
					</div>
					</div>
					<div class="content-email"><?php echo $email ?></div>
					<div class="content-hp"><?php echo $no_hp ?></div>
				</div>
				<?php
					if($is_driver==true) {

						$query = "SELECT preferred_loc FROM preferred_location WHERE user_id = $id";
						$loc_list = $conn->query($query);
						echo '<div class="pref-container" style="display: flex; flex-direction: column;">';
							echo '<div class="menu-container" style="display: flex">';
								echo '<div class="menu-title" style="font-size: 28px">PREFERRED LOCATION</div>';
								echo '<div class="menu-profile-edit-icon"><img src="../assets/icon-pencil.png" height="40px" width="40px" id="icon-edit-location">';
								echo '</div>';
								echo '</div>';
							echo '<div class="loc-list-container" style="display: flex;">';
								while ($row = mysqli_fetch_array($loc_list)) {
								echo '<ul>';
								echo '<ul><li>'.$row['preferred_loc']. '</li></ul><br>';
								echo '<ul>';
							}
							echo '</div>';
							echo '</div>';
						}
				?>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">
				
    					document.getElementById("icon-edit-profile").onclick = function () {
       					 location.href = "editprofile.php?id_active=" + id;
       					 }
       					 if(is_driver==true) {
       						document.getElementById("icon-edit-location").onclick = function () {
       					 	location.href = "editlocation.php?id_active=" + id;
       					 }
					}
					</script>
</html>