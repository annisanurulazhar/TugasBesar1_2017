<?php
	include '../handlers/config.php';
	if ($_POST['confirmpass']) {
		$pass = $_POST['password'];
		$confirm_pass = $_POST['confirmpass'];
		// $id = $_POST['user_id'];
		$sql = "SELECT * FROM penumpang WHERE penumpang.username='$confirm_pass'";

		// $result = mysqli_query($conn,$sql);
		// while ($row = $result->fetch_assoc()) {
			// $id = $row['user_id'];
		// }
		// $row = mysqli_fetch_array($result);
		
		if($confirm_pass != $pass) {
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>