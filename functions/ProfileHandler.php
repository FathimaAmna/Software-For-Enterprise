<?php
// Include the database connection file
include '../configs/database.php';

function func_alert($message)
{
	echo '<script language="javascript">';
	echo 'alert("' . $message . '");';
	echo 'location.href="../editProfile.php"';
	echo '</script>';
}

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the new username from the form
	$newUsername = $_POST["txtName"];

	// Check if the new username already exists in the database
	$sql = "SELECT * FROM user WHERE username = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $newUsername);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		// Username already exists, display error message
		func_alert("Username already exists. Please choose a different username.");
		
	} else {
		// Update the user's profile with the new username
		$userId = $_SESSION["user_id"];
		$updateSql = "UPDATE user SET username = ? WHERE user_id = ?";
		$updateStmt = $conn->prepare($updateSql);
		$updateStmt->bind_param("si", $newUsername, $userId);
		if ($updateStmt->execute()) {
			// Username updated successfully
			$_SESSION["username"] = $newUsername; // Update session username
			echo "Username updated successfully.";
			header('Location:../profile.php');
		} else {
			// Failed to update username
			echo "Error updating username.";
			header('Location:../editProfile.php');
		}
		$updateStmt->close();
	}

	$stmt->close();
}
