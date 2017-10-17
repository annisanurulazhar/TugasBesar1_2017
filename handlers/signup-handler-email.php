<?php
	include '../handlers/config.php';
	if ($_POST['email'])) {
		$email = $_POST['email'];
		
		$sql = "SELECT * FROM penumpang WHERE penumpang.username='$email'";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) >= 1)) {
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>

 <!-- || !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email -->