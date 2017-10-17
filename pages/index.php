 <?php
$servername = "sql12.freemysqlhosting.net";
$username = "sql12197052";
$password = "gaJn6r2Q6M";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

echo '"lalala"';
?> 