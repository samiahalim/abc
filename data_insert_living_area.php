<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'brms';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (!isset($_POST['area_name'])) {
	exit('Please input ');
}
if (empty($_POST['area_name'])) {
	exit('Please input ');
}
if ($stmt = $con->prepare('INSERT INTO living_area (area_name) VALUES (?)')) {
		$stmt->bind_param('s', $_POST['area_name']);
		$stmt->execute();
		
		//echo 'Data Insert';
		
		} else {
		echo 'Could not prepare statement!';
		}
$con->close();
?>