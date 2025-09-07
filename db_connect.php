<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'brgy_disaster';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>