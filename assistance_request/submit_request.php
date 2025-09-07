<?php
include '../db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $req = $_POST['request_type'];
    $urgency = $_POST['urgency'];
    $details = $_POST['details'];
    $conn->query("INSERT INTO requests (name, contact, request_type, urgency, details) VALUES ('$name','$contact','$req','$urgency','$details')");
    echo "Request submitted.";
}
?>