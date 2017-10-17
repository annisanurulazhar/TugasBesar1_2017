 <?php
			include '../handlers/config.php';

			$id = $_GET['id_active'];

			$sql = "SELECT username, nama_lengkap, email, no_hp, is_driver, photo FROM penumpang WHERE user_id= '$id' ";

			$result = $conn->query($sql);

			$row = $result->fetch_assoc();

			$username = $row["username"];
			$fullname = $row["nama_lengkap"];
			$email = $row["email"];
			$no_hp = $row["no_hp"];
			$is_driver = $row["is_driver"];
			$url_photo = "../" . $row["photo"];

			echo '<script> var id =' . $id . '</script>';
		?> 
<!DOCTYPE html>
<html>
	<head>
		<title>
			Edit Profile
		</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles/profile.css">
	</head>
	<body>
		
		<div class="flex-container">
			<div id="container" class="flex-container container"> 
				<div class="menu-title-edit">EDIT PROFILE INFORMATION</div>
				<div class="content-container">
					<form action="../handlers/profile_handler.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="user_id" value="<?php echo $id ?>">
						<div class = "edit-image-container">
							<div class="edit-image"><img class = "img-square" src="<?php echo $url_photo ?>" height="140px" width="140	px"></div>
							<div class="edit-image-browse">
								<input id="uploadFile" class ="url-placeholder" placeholder="Choose File" name="photo_name" type="text">
								<input id = "uploadButton" type="file" class="button-upload" name="photo" accept="image/*">
							</div>
						</div>
    					<div class="button-container">
       						 <label for="name">Your Name</label>
       						 <input type="text" id="name" name="user_fullname" value="<?php echo $fullname ?>">
  						</div>
   						 <div class="button-container" style="margin-top: -15px">
        					<label for="phone">Phone</label>
        					<input type="phone" id="phone" name="user_phone" value="<?php echo $no_hp ?>">
   						</div>
   						<label for="isdriver" style="width: 420px">Status Driver</label>
   						<div class="switch">
  							<input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round" type="checkbox" name="is_driver" <?php if ($is_driver) {echo 'checked="true"'; }?> />
  							<label for="cmn-toggle-1"></label>
						</div>
						<div class="button-container"></div>
						<div class="button-container">
							<div class="button-back">
								<button id="back">BACK</button>
							</div>
							<div class="button-save">
								<button name="update" type = "submit" >SAVE</button>
							</div>
							
						</div>
								
						</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		document.getElementById("uploadButton").onchange = function () {
    	document.getElementById("uploadFile").value = this.value;
		}

	</script>
	</body>
	
	
</html>