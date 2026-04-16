<!DOCTYPE html>
<html>
<head>
<style>
.schedule-table {
  border-collapse: collapse;
  width: 100%;
  background-color: #f0f8ff;
  border-radius: 8px;
  overflow: hidden;
}
.schedule-table th {
  background-color: #d9f0ff;
  padding: 10px;
}
.schedule-table td {
  padding: 10px;
  border: 1px solid #d0e6f7;
}

</style>
</head>

<h1 align="center">Doctors Schedule</h1>

<?php

session_start();
if (!isset($_SESSION['staff_logged_in']) || $_SESSION['staff_logged_in'] !== true) {
    header("Location: login.html");
    exit();
}
include 'db_connect.php';

// Fetch availability
$sql = "
  SELECT 
    da.doctor_id, 
    d.name,
	d.specialty,
    da.available_day, 
    da.start_time, 
    da.end_time 
  FROM doctor_availability da
  JOIN doctors d ON da.doctor_id = d.doctor_id
  ORDER BY FIELD(da.available_day, 'Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday')
";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
echo "<center>";
echo "<table class='schedule-table'>";
echo "<tr>
		<th>Available Day</th>
		<th>Doctor's ID</th>
		<th>Doctor's Name</th>
		<th>Specialty</th>
		<th>From (Time)</th>
		<th>To (Time)</th>
	  </tr>";
	  
	  while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
		echo "<td>" . htmlspecialchars($row['available_day']) . "</td>";
        echo "<td>" . htmlspecialchars($row['doctor_id']) . "</td>";
		echo "<td>" . htmlspecialchars($row['name']) . "</td>";
		echo "<td>" . htmlspecialchars($row['specialty']) . "</td>";
        echo "<td>" . htmlspecialchars($row['start_time']) . "</td>";
        echo "<td>" . htmlspecialchars($row['end_time']) . "</td>";
		echo "</tr>";
	  }
	  
echo "</table>";
echo "</center>";
}


?>
</html>