<?php
session_start();
include './configs/database.php'; // Include the database connection file

// Get the score, duration, user ID, and life from the request
if(isset($_POST['score'])) {
    $score = $_POST['score']; 
    // Proceed with saving the score to the database

    $user_id = $_SESSION["user_id"]; // user ID via POST request
    $life = 1; // Assuming you are sending the life via POST request


    // Prepare SQL statement to insert data into the leaderboard table
    $sql = "INSERT INTO leaderboard (score, user_id, life) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("iii", $score, $user_id, $life); // Assuming score and life are integers, duration is integer or float, and user_id is integer
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Score saved successfully";
    } else {
        echo "Failed to save score";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Score parameter is missing in the POST request.";
}
?>