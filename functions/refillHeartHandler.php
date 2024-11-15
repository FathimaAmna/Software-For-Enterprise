<?php
// Include the database connection file
include '../configs/database.php';

// Start the session (assuming sessions are used to store user_id)
session_start();

// Check if user_id is set in the session
if (isset($_SESSION["user_id"])) {
    // Get user_id from session
    $user_id = $_SESSION["user_id"];

    // Update the user table to decrease heart value by 1
    $sql = "UPDATE user SET heart = 3 WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        echo "User's heart value updated successfully";
    } else {
        echo "Failed to update user's heart value";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "User ID is not set in the session";
}
?>
