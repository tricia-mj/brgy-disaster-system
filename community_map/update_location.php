<?php
include '../db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $conn->query("INSERT INTO map_markers (name, type, lat, lng) VALUES ('$name','$type','$lat','$lng')");
    echo "Location updated.";
}
?>
<form method="POST">
  Name: <input type="text" name="name"><br>
  Type: <select name="type">
          <option value="evacuation">Evacuation</option>
          <option value="blocked">Blocked Road</option>
          <option value="danger">Danger Zone</option>
        </select><br>
  Lat: <input type="text" name="lat"><br>
  Lng: <input type="text" name="lng"><br>
  <button type="submit">Add Marker</button>
</form>