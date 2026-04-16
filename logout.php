<?php
include 'db_connect.php'; // Your DB connection file
session_start();
date_default_timezone_set('Asia/Kolkata');
$logout_time = date('Y-m-d H:i:s');
$staff_id = $_SESSION['staff_id'];
$id = $_SESSION['login_record_id'];

$sql = "UPDATE login_history 
        SET logout_time = ? 
        WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $logout_time, $id);
$stmt->execute();
session_unset();
session_destroy();
header("Location: login.html");
exit();
?>