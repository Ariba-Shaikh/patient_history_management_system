<!DOCTYPE html>
<html>
<head>
<style>
.search {
  border-collapse: collapse;
  width: 100%;
  background-color: #f0f8ff;
  border-radius: 8px;
  overflow: hidden;
}
.search th {
  background-color: #d9f0ff;
  padding: 10px;
}
.search td {
  padding: 10px;
  border: 1px solid #d0e6f7;
}
</style>
</head>
<?php
session_start();
include 'db_connect.php';

$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : null;

if ($patient_id) {
    $sql = "SELECT a.patient_id, a.first_name, a.last_name, a.disease, a.appointment_time, d.name, mr.visit_date, mr.prescription
          FROM appointments a
          JOIN medical_records mr ON a.patient_id = mr.patient_id AND a.doctor_id = mr.doctor_id 
          JOIN doctors d ON a.doctor_id = d.doctor_id
		  WHERE a.patient_id = ?
          GROUP BY mr.visit_date, a.patient_id
          ORDER BY mr.visit_date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();
	
} else {
    // Show all records if no search is performed
    $sql = "SELECT * FROM patients ORDER BY visit_date DESC";
    $result = $conn->query($sql);
}
?>

<!-- Display the results -->
<h1 align="center">Search Result</h1>
<table class="search">

    <tr>
      <th>Visit Date</th>
      <th>Appointment Time</th>
      <th>Patient ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Disease</th>
      <th>Doctor Name</th>
      <th>Prescription</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['visit_date']) ?></td>
        <td><?= htmlspecialchars($row['appointment_time']) ?></td>
        <td><?= htmlspecialchars($row['patient_id']) ?></td>
        <td><?= htmlspecialchars($row['first_name']) ?></td>
        <td><?= htmlspecialchars($row['last_name']) ?></td>
        <td><?= htmlspecialchars($row['disease']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['prescription']) ?></td>
      </tr>
    <?php endwhile; ?>

</table>
</html>