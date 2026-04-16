<?php
// login.php
session_start();
include 'db_connect.php'; // Your DB connection file
date_default_timezone_set('Asia/Kolkata');

$staff_id = $_POST['staff_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM staff WHERE staff_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $staff_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['staff_id'] = $row['staff_id'];
        $_SESSION['role'] = $row['role'];
		$_SESSION['staff_logged_in'] = true;
        
		
		/*The below code is for storing Login History.*/
	

		$login_time = date('Y-m-d H:i:s');
		$sql2 = "INSERT INTO login_history (staff_id, login_time)
        VALUES (?, ?)";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->bind_param("ss", $staff_id, $login_time);
		$stmt2->execute();
		$_SESSION['login_record_id'] = $stmt2->insert_id;

		
        header("Location: dashboard.php");
		exit();
    } else {
        // Wrong password → back to login page with ?error=pass
        header("Location: login.html?error=pass");
        exit();
    }
} else {
    // Staff ID not found → back to login page with ?error=id
    header("Location: login.html?error=id");
    exit();
}
?>
