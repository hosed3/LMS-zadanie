<?php
session_start();
include 'connection.php';


 
$email=$_POST["admin_email"];
$pass=$_POST["admin_password"];

$sql = "SELECT email, id, name, supervisor_id FROM employees WHERE email = '$email' and password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	$_SESSION["name"] = $row['name'];
	$_SESSION["supervisor_id"] = $row['supervisor_id'];
	$_SESSION["employee_id"] = $row['id'];
	$conn->close();
	header("Location: index.php");
	exit;
}
$conn->close();
header("Location: login.php");
exit;		
?>