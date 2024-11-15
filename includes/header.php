<?php
session_start(); // Starting or resuming the session

// Redirect to login page if the user is not logged in and not accessing registration page
if (!isset($_SESSION["username"]) && $_SERVER['PHP_SELF'] != '/tomato-API-game/login.php' && $_SERVER['PHP_SELF'] != '/tomato-API-game/registration.php') {
  header('Location: ./login.php');
  exit; // Ensure no further execution of the script after redirection
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" />

  <!-- Unicons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <?php include './assets/css/critical.css.php' ?>

  <?php
  // Get the current URL
  $current_url = $_SERVER['REQUEST_URI'];

  // Define an array of URLs and their corresponding CSS files
  $url_css_mapping = array(
    '/tomato-API-game/index.php' => './assets/css/style.css?v=' . time(),
    '/tomato-API-game/registration.php' => './assets/css/auth.css?v=' . time(),
    '/tomato-API-game/login.php' => './assets/css/auth.css?v=' . time(),
    '/tomato-API-game/setting.php' => './assets/css/setting.css?v=' . time(),
    '/tomato-API-game/leaderboad.php' => './assets/css/auth.css?v=' . time(),
    '/tomato-API-game/game.php' => './assets/css/gameStyle.css?v=' . time(),
    '/tomato-API-game/mathsGame.php' => './assets/css/maths.css?v=' . time(),
    '/tomato-API-game/profile.php' => './assets/css/auth.css?v=' . time(),
    '/tomato-API-game/editProfile.php' => './assets/css/auth.css?v=' . time(),
    // Add more mappings as needed
  );

  // Check if the current URL has a corresponding CSS file
  if (array_key_exists($current_url, $url_css_mapping)) {
    $css_file = $url_css_mapping[$current_url];
    echo '<link rel="stylesheet" type="text/css" href="' . $css_file . '">';
  }
  ?>


</head>

<body>
  <style>
    #playPauseButton {
      position: fixed;
      bottom: 20px;
      /* Adjust this value to change the distance from the bottom */
      left: 5%;
      transform: translateX(-50%);
      background-color: lightcoral;
      border: none;
      padding: 10px;
      cursor: pointer;
      outline: none;
      z-index: 999;
      /* Ensure the button is above other content */
      border-radius: 20%;
      margin-bottom: 2%;
    }

    #playPauseButton i {
      font-size: 24px;
      color: white;
    }

    #playPauseButton:hover {
      background-color: red;
    }
  </style>
  <audio id="backgroundMusic" autoplay loop>
    <source src="./assets/music/game-music.mp3" type="audio/mpeg" preload="auto" />
  </audio>

  <button onclick="playBackgroundMusic()" id="playPauseButton" style="pointer-events: auto;" tabindex="-1">
    <i class="fa-solid fa-pause"></i>
  </button>

  <script>
    // Get the audio element and the play/pause button
    const backgroundMusic = document.getElementById("backgroundMusic");
    const playPauseButton = document.getElementById("playPauseButton");

    function playBackgroundMusic() {
      if (backgroundMusic.paused) {
        // If music is paused, play it and change button icon to "Pause"
        backgroundMusic.play();
        playPauseButton.innerHTML = '<i class="fas fa-pause"></i>';
      } else {
        // If music is playing, pause it and change button icon to "Play"
        backgroundMusic.pause();
        playPauseButton.innerHTML = '<i class="fas fa-play"></i>';
      }
    }
    // Automatically play background music when the page loads
    window.addEventListener('load', function() {
      backgroundMusic.play();
    });
  </script>