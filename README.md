# Barangay Disaster Information and Response System
This is a starter kit for your System Integration project.  
Tools: PHP, MySQL, HTML, Google Maps API, CSV/PDF Export.

## Setup Instructions
1. Import the provided SQL tables into your MySQL database `brgy_disaster`.
2. Place this project inside `htdocs` (XAMPP) or your web server folder.
3. Update `db_connect.php` with your MySQL credentials.
4. Access the modules via browser:
   - Alerts: `/alert_posting/post_alert.php` and `/alert_posting/view_alerts.php`
   - Map: `/community_map/map.php`
   - Requests: `/assistance_request/request_form.html`
   - Incidents: `/incident_archive/log_incident.php`
5. To use PDF export, run `composer require dompdf/dompdf`.
