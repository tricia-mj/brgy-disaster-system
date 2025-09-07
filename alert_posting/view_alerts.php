<?php
include '../db_connect.php';
$res = $conn->query("SELECT * FROM alerts ORDER BY posted_at DESC");
while($row = $res->fetch_assoc()){
    echo "<p><b>{$row['posted_at']}:</b> {$row['message']}</p>";
}
?>