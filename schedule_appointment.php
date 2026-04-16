<!DOCTYPE html>
<html>
<head>
<style>
#msg { 
font-size: 30px;
font-weight:bold;
text-align: center; 
color: #ffffff; 
 }

.done {
  display: flex;
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
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
	$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
	$date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
	$contact_number = $_POST['contact_number'];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
	$disease = $_POST['disease'];

    $stmt = $conn->prepare("INSERT INTO appointments (patient_id, doctor_id, first_name, last_name, date_of_birth, gender, contact_number, email, address, appointment_date, appointment_time, disease) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("iissssisssss", $patient_id, $doctor_id, $first_name, $last_name, $date_of_birth, $gender, $contact_number, $email, $address, $appointment_date, $appointment_time, $disease);
    $stmt->execute();
	echo "<div class='done'>";
    echo "<p id='msg'>Appointment Scheduled Successfully!</p>";
	echo "</div>";
    $stmt->close();
    $conn->close();
}
?>
</html>