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

<form action="add_patient.php" method="POST">
<h2 align="center"><b>Patient Registration Form<b></h2>

<table>

<tr>
<th colspan="2"><h3><u>Patient Details:</u></h3></th>
</tr>

<tr>
<td><label>Medical Record ID:</label></td>
<td><input type="number" name="medical_record_id" placeholder="e.g. 003" maxlength="10" required></td>
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
<td><label>Visit Date:</label></td>
<td><input type="date" name="visit_date" required></td>
</tr>

<tr>
<td><label>Diagnosis:</label></td>
<td><input type="text" name="diagnosis"></td>
</tr>

<tr>
<td><label>Treatment:</label></td>
<td><input type="text" name="treatment"></td>
</tr>

<tr>
<td><label>Prescription:</label></td>
<td><input type="text" name="prescription" required></td>
</tr>

<tr>
<td><label>Notes:</label></td>
<td><input type="text" name="notes"></td>
</tr>

<tr>
<td><input type="reset" name="reset" value="Clear"></td>
<td><button type="submit">Submit</button></td>
</tr>

</table>

</form>
</body>
</html>