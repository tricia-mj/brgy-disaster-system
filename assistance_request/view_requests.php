<?php
include '../db_connect.php';
$res = $conn->query("SELECT * FROM requests ORDER BY FIELD(urgency,'high','medium','low'), submitted_at ASC");
while($row = $res->fetch_assoc()){
    echo "<p><b>{$row['urgency']} - {$row['request_type']}:</b> {$row['details']} (By {$row['name']}, {$row['contact']})</p>";
}
?>