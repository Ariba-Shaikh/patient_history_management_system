<!DOCTYPE html>
<html>
<head>
<style>
.login-hist-table {
  border-collapse: collapse;
  width: 100%;
  background-color: #f0f8ff;
  border-radius: 8px;
  overflow: hidden;
}
.login-hist-table th {
  background-color: #d9f0ff;
  padding: 10px;
}
.login-hist-table td {
  padding: 10px;
  border: 1px solid #d0e6f7;
}
</style>
</head>
<?php
session_start();

if (!isset($_SESSION['staff_logged_in']) || $_SESSION['staff_logged_in'] !== true) {
    header("Location: login.html");
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
 header("Location: http://localhost/clinic_system/dashboard.php");

}

else
{
	
include 'db_connect.php';

$query = "SELECT id, staff_id, login_time, logout_time
		  FROM login_history 
		  ORDER BY login_time DESC";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}
}
?>
<table class="login-hist-table">

    <tr>
	  <th>ID</th>
      <th>Staff ID</th>
      <th>Login Time</th>
      <th>Logout Time</th>
    </tr>
  
    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
	    <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['staff_id']) ?></td>
        <td><?= htmlspecialchars($row['login_time']) ?></td>
        <td><?= htmlspecialchars($row['logout_time']) ?></td>
      </tr>
    <?php endwhile; ?>
</table>
</html>