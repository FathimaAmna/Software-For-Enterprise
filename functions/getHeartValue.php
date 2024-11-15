<?php
session_start();

// Include the database connection file
include '../configs/database.php';

// Check if user_id is set in the session
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    // Query the database to fetch the user's heart value
    $sql = "SELECT heart FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($heart);
    $stmt->fetch();
    $stmt->close();

    // Prepare the response array
    $response = array('heart' => $heart);

    // Return the response in JSON format
    echo json_encode($response);
} else {
    // If user_id is not set in the session, return an error message
    echo json_encode(array('error' => 'User ID is not set in the session'));
}
?>
