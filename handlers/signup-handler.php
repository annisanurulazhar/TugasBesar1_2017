<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "ojekonline";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	}

	if (isset($_POST['submit'])) {

		$yourname = $_POST['yourname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_pass = $_POST['confirmpass'];
		$phone = $_POST['phonenumber'];
		$is_driver = $_POST['checkbox'];

		$sql = "INSERT INTO penumpang(username,nama_lengkap, no_hp, email, is_driver) VALUES ($username, $yourname, $phone, $email, $is_driver)";

		if(mysqli_query($conn, $sql)) {
			header('location: ../pages/login.php');
			echo "Registered";
		} else {
			echo "Register failed";
		}
	}
	$conn->close();
?>