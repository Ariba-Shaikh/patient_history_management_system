<!DOCTYPE html>
<html>
<head>
<style>
.appointments-container { 
max-width: 700px;
margin: 20px auto;
padding: 20px;
background-color: #f9fcff;
border: 1px solid #d0e3f0;
border-radius: 8px;
font-family: 'Segoe UI';
 }
h2 { 
text-align: center; 
color: #2c3e50; 
margin-bottom: 20px; 
 }
.appointments-container ul { 
list-style: none; 
padding: 0; 
 }
.appointments-container li { 
background-color: #ffffff;
border-left: 5px solid #3498db;
margin-bottom: 12px;
padding: 12px 16px;
border-radius: 4px;
display: flex;
justify-content: space-between;
align-items: center;
 }
</style>
</head>
<?php

session_start();
if (!isset($_SESSION['staff_logged_in']) || $_SESSION['staff_logged_in'] !== true) {
    header("Location: login.html");
    exit();
}
// Connect to database
include 'db_connect.php';

// Get today's date
date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');

// Fetch appointments for today
$sql = "SELECT a.patient_id, a.first_name, a.last_name, a.doctor_id, a.appointment_time, d.name
		FROM appointments a
		JOIN doctors d ON a.doctor_id=d.doctor_id
		WHERE appointment_date = ?
		ORDER BY a.appointment_time";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
if (!$stmt->execute()) {
    die("Insert failed: " . $stmt->error);
}
$result = $stmt->get_result();


echo "<div class='appointments-container'>";

// Display appointments
if ($result->num_rows > 0) {
	echo "<h2>Today's Appointments</h2>";
    echo "<ul>";
	while ($row = $result->fetch_assoc()) {
        echo "<li>
            <strong>{$row['first_name']}  {$row['last_name']}</strong> with id <strong>{$row['patient_id']}</strong> has  Appointment  at  <strong>{$row['appointment_time']}</strong> with <strong>{$row['name']}</strong>
        </li>";
	}
    echo "</ul>";
	
}
 else {
    echo "<h2>No appointments scheduled for today.</h2>";
}
echo "</div>";
$stmt->close();
$conn->close();
?>
</html>