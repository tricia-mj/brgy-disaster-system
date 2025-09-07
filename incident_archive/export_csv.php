<?php
include '../db_connect.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=incidents.csv');
$out = fopen('php://output', 'w');
fputcsv($out, ['ID','Disaster Type','Affected People','Response Time','Actions Taken','Logged At']);
$res = $conn->query("SELECT * FROM incidents");
while($row = $res->fetch_assoc()){
    fputcsv($out, $row);
}
fclose($out);
?>