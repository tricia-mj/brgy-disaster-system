<!DOCTYPE html>
<html>
<head>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {zoom: 14, center: {lat: 14.5995, lng: 120.9842}});
  <?php
  include '../db_connect.php';
  $res = $conn->query("SELECT * FROM map_markers");
  while($row = $res->fetch_assoc()){
      echo "new google.maps.Marker({position: {lat: {$row['lat']}, lng: {$row['lng']}}, map: map, title: '{$row['name']}'});
";
  }
  ?>
}
</script>
</head>
<body onload="initMap()">
  <div id="map" style="width:100%;height:500px;"></div>
</body>
</html>