<?php
	include '../handlers/config.php';
	if ($_GET['email'])) {
		$email = $_GET['email'];
		// $id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.email='" . $email . "'");
		$result = $conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$id = $row['user_id'];
		}

		if(mysql_num_rows($query) >= 1 || !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>