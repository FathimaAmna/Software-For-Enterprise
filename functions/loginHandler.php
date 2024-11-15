<?php
session_start();
include_once '../configs/database.php';

function func_alert_signin($message)
{
	echo '<script language="javascript">';
	echo 'alert("' . $message . '");';
	echo 'location.href="../login.php"';
	echo '</script>';
}

function func_alert_signup($message)
{
	echo '<script language="javascript">';
	echo 'alert("' . $message . '");';
	echo 'location.href="../registration.php"';
	echo '</script>';
}

if (isset($_POST["signInBtn"])) {
	$username = $_POST["txtName"];
	$password =  md5($_POST["txtPassword"]);

	if (!$username || !$password) {
		echo `
			<script>
				alert("Enter your username and password");
			</script>
		`;
	}

	$sql = "SELECT * FROM `user` WHERE `username`='" . $username . "' AND `password`='" . $password . "'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["username"] = $row["username"];
		header('Location:../index.php');
	} else {
		header('Location:../login.php');
	}
}

if (isset($_POST["signUpBtn"])) {
	// Get form data
	$username = $_POST["txtName"];
	$password = md5($_POST["txtPassword"]);

	// Check if the username already exists in the database
	$check_query = "SELECT * FROM `user` WHERE `username` = '$username'";
	$result = mysqli_query($conn, $check_query);
	if (mysqli_num_rows($result) > 0) {
		// Username already exists, display error message
		func_alert_signup("Username already exists! Please choose a different one.");
	} else {
		// Username is unique, proceed with registration
		$sql = "INSERT INTO `user` (`user_id`, `username`, `password`) VALUES (NULL, '$username', '$password')";

		if (!mysqli_query($conn, $sql)) {
			// Error inserting into database
			func_alert_signup("Unable to register!");
		} else {
			// Registration successful
			func_alert_signin("You have registered successfully!");
		}
	}
}

mysqli_close($conn);
