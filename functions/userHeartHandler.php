<?php
// Include the database connection file
include '../configs/database.php';

// Start the session (assuming sessions are used to store user_id)
session_start();

// Check if user_id is set in the session
if (isset($_SESSION["user_id"])) {
    // Get user_id from session
    $user_id = $_SESSION["user_id"];

    // Fetch the current heart value and heart refill timer from the database
    $sql = "SELECT heart, heart_refill_timer FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($current_heart, $heart_refill_timer);
    $stmt->fetch();
    $stmt->close();

    // Check if the current heart value is greater than 0
    if ($current_heart > 0) {
        // Update the user table to decrease heart value by 1
        $sql = "UPDATE user SET heart = heart - 1 WHERE user_id = ?";
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
        echo "User's heart value is already 0. Cannot reduce further.";

        // Update the heart refill timer to the current time
        $current_time = date('Y-m-d H:i:s');
        $sql = "UPDATE user SET heart_refill_timer = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $current_time, $user_id);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            echo "Heart refill timer updated successfully";
        } else {
            echo "Failed to update heart refill timer";
        }

        // Close the statement
        $stmt->close();
    }
} else {
    echo "User ID is not set in the session";
}
?>
