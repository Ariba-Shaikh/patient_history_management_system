<?php
//Creating connection and checking it.
$conn=mysqli_connect("localhost", "root", "phpUser", "clinic_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>