<?php
require '../vendor/autoload.php';
include '../db_connect.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$html = "<h1>Incident Report</h1><table border='1'><tr><th>ID</th><th>Disaster</th><th>Affected</th><th>Response</th><th>Actions</th><th>Date</th></tr>";
$res = $conn->query("SELECT * FROM incidents");
while($row = $res->fetch_assoc()){
    $html .= "<tr><td>{$row['id']}</td><td>{$row['disaster_type']}</td><td>{$row['affected_people']}</td><td>{$row['response_time']}</td><td>{$row['actions_taken']}</td><td>{$row['logged_at']}</td></tr>";
}
$html .= "</table>";
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("incidents.pdf");
?>