<?php
session_start();
if (!isset($_SESSION['staff_logged_in']) || $_SESSION['staff_logged_in'] !== true) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Medical History Management website</title>
<style>
table {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        #errorMessages {
            color: red;
            margin-top: 10px;
        }
    </style>

</style>
</head>
<body>

<form action="schedule_appointment.php" method="POST">
<h2 align="center"><b>Appointment Scheduling Form<b></h2>

<table>

<tr>
<th colspan="2"><h3><u>Patient Details:</u></h3></th>
</tr>
	
<tr>
<td><label>Patient's ID:</label></td>
<td><input type="number" name="patient_id" placeholder="e.g. 001" maxlength="10" required></td>
</tr>

<tr>
<td><label>Doctor's ID:</label></td>
<td><input type="number" name="doctor_id" placeholder="e.g. 005" maxlength="10" required></td>
</tr>

<tr>
<td><label>Patient's First Name:</label></td>
<td><input type="text" name="first_name" maxlength="20" placeholder="FIRST NAME" required></td>
</tr>

<tr>
<td><label>Patient's Last Name:</label></td>
<td><input type="text" name="last_name" maxlength="20" placeholder="LAST NAME"></td>
</tr>

<tr>
<td><label>D.O.B. of the Patient:</label></td>
<td><input type="date" name="date_of_birth" required></td>
</tr>

<tr>
<td><label>Select Gender:</label></td>
<td><select name="gender">
<option value="male">Male</option>
<option value="female">Female</option>
<option value="other">Other</option>
</select></td>
</tr>

<tr>
<td><label>Contact Number:</label></td>
<td><input type="number" name="contact_number" maxlength="10" placeholder="0000-00-0000" required></td>
</tr>

<tr>
<td><label>Enter e-mail Address:</label></td>
<td><input type="email" name="email" placeholder="e.g. abc@gmail.com" required></td>
</tr>

<tr>
<td><label>Enter Address:</label></td>
<td><textarea rows="3" cols="28" name="address" required></textarea></td>
</tr>


<tr>
<th colspan="2"><h3><u>Appointment Information</u></h3></th>
</tr>

<tr>
<td><label>Appointment Date:</label></td>
<td><input type="date" name="appointment_date"required></td>
</tr>

<tr>
<td><label>Appointment Time:</label></td>
<td><input type="time" name="appointment_time"required></td>
</tr>

<tr>
<td><label>Disease:</label></td>
<td><input type="text" name="disease" maxlength="40" required></td>
</tr>

<tr>
<td><input type="reset" name="reset" value="Clear"></td>
<td><button type="submit">Submit</button></td>
</tr>

</table>

</form>
</body>
</html>