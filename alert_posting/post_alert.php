<?php
include '../db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = $_POST['message'];
    $conn->query("INSERT INTO alerts (message) VALUES ('$msg')");
    echo "Alert posted successfully.";
}
?>
<form method="POST">
    <textarea name="message" placeholder="Enter alert message"></textarea><br>
    <button type="submit">Post Alert</button>
</form>