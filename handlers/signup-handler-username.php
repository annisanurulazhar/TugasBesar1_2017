<?php
	include '../handlers/config.php';
	if ($_POST['username']) {
		$username = $_POST['username'];

		$sql = "SELECT * FROM penumpang WHERE penumpang.username='$username'";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) >= 1 || strlen($username) > 20 || strlen($username) < 4){	
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>