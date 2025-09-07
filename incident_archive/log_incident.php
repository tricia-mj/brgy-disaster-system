<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['disaster_type'];
    $people = $_POST['affected_people'];
    $time = $_POST['response_time'];
    $actions = $_POST['actions_taken'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO incidents (disaster_type, affected_people, response_time, actions_taken) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $type, $people, $time, $actions);

    if ($stmt->execute()) {
        echo "✅ Incident logged successfully.";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>