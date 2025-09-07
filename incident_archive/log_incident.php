<?php
include '../db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['disaster_type'];
    $people = $_POST['affected_people'];
    $time = $_POST['response_time'];
    $actions = $_POST['actions_taken'];
    $conn->query("INSERT INTO incidents (disaster_type, affected_people, response_time, actions_taken) VALUES ('$type','$people','$time','$actions')");
    echo "Incident logged.";
}
?>
<form method="POST">
  Disaster Type: <input type="text" name="disaster_type"><br>
  Affected People: <input type="number" name="affected_people"><br>
  Response Time: <input type="text" name="response_time"><br>
  Actions Taken: <textarea name="actions_taken"></textarea><br>
  <button type="submit">Log Incident</button>
</form>