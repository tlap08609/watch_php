<?php
$servername = "localhost";
$username = "root";
$password = "cool0519";
$dbname = "watch";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>