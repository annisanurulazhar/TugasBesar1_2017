<?php
	include '../handlers/config.php';
	if (isset($_POST['username']) && (isset($_POST['password']))) {

		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM penumpang WHERE username='".$username."' AND password= '".$password."'";

		$result = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($result);
		$id = $row['user_id'];

		if(mysqli_num_rows($result) == 1) {
			header('location: ../pages/profile.php?id_active=' . $id);
		} else {
			header("location: ../pages/login.php");
		}
	}
	$conn->close();
?>