<!DOCTYPE html>
<html>
<!--Patient's Medical Record Registered successfully!-->
<head>
<style>
#msg { 
font-size: 30px;
font-weight:bold;
text-align: center; 
color: #ffffff; 
 }
 
#hint { 
font-size: 22px;
font-weight:bold;
text-align: center;
color: #ffffff; 
 }

.done {
  display: flex;
  flex-direction: column;     /* Stack items vertically */
  justify-content: center;   /* Horizontal centering */
  align-items: center;       /* Vertical centering */
  height: 100vh;             /* Full viewport height */
  margin: 0;                 /* Remove default margin */
  background-color:#a4eaff;
}
</style>
</head>
<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medical_record_id = $_POST['medical_record_id'];
    $patient_id = $_POST['patient_id'];
	$doctor_id = $_POST['doctor_id'];
	$visit_date = $_POST['visit_date'];
    $diagnosis = $_POST['diagnosis'];
	$treatment = $_POST['treatment'];
    $prescription = $_POST['prescription'];
	$notes = $_POST['notes'];
	
    $stmt = $conn->prepare("INSERT INTO medical_records (medical_record_id, patient_id, doctor_id, visit_date, diagnosis, treatment, prescription, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("iiisssss", $medical_record_id, $patient_id, $doctor_id, $visit_date, $diagnosis, $treatment, $prescription, $notes);
    $stmt->execute();
	echo "<div class='done'>";
    echo "<p id='msg'>Patient's Record Added Successfully!</p>";
	echo "</div>";
    $stmt->close();
    $conn->close();
}

?>
</html>