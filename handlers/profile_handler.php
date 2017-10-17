<?php
	
	$id = $_POST['user_id'];

	if(isset($_POST['update']))
	{
		//Fetching current data
		include 'config.php';

		$user_id = $_POST['user_id'];

		$sql = "SELECT username FROM penumpang WHERE user_id= $user_id";

		$result = $conn->query($sql);

		$row = $result->fetch_assoc();

		$username = $row['username'];



		//Getting data from placeholder
		$nama = $_POST['user_fullname'];
		$phone = $_POST['user_phone'];

		if(!empty($_POST['is_driver'])) {
			$is_driver = true;
		} else {
			$is_driver = false;
		}

		//If user wants to change profile picture
		if ($_POST['photo_name']!="") {
			$target_dir = "../assets/image/user_photo/";
			$target_file = $target_dir . $_FILES['photo']['name'];
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		// Check if image file is a actual image or fake image
   			 $check = getimagesize($_FILES['photo']['tmp_name']);	
   			 if($check !== false) {
       			 echo "File is an image - " . $check["mime"] . ".";
       			 $uploadOk = 1;
   	 		} else {
        		echo "File is not an image.";
       		 	$uploadOk = 0;
   			}

   		$dir = "TugasBesar1_2017";
   		$temp = explode(".", $_FILES['photo']['name']);
		$newfilename = $username . '.' . end($temp);

   		if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $newfilename)) {
   			echo "Success" . $target_dir . $newfilename;
   		} else {
   			echo "Not yet";
   		}

   		$new_url = "assets/image/user_photo/" . $newfilename;

   			$sql = "UPDATE penumpang SET nama_lengkap = '$nama' , no_hp = '$phone' , is_driver = '$is_driver', photo = '$new_url' WHERE user_id= $user_id ";
		} else {
			$sql = "UPDATE penumpang SET nama_lengkap = '$nama' , no_hp = '$phone' , is_driver = '$is_driver' WHERE user_id= $user_id ";
		}
		

		//Saving to database

		
		if ($conn->query($sql) === TRUE) {
    		echo "Record updated successfully";
		} else {
   			 echo "Error updating record: " . $conn->error;
		}

		header("Location: ../pages/profile.php?id_active=" . $user_id);

$conn->close();
		} else {
			header("Location: ../pages/profile.php?id_active=" . $id);
		}
?>