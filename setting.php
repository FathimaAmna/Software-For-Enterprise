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
  }

  #playPauseButton i {
    font-size: 24px;
    color: white;
  }

  #playPauseButton:hover {
    background-color: red;
  }
</style>


<audio id="music" autoplay loop>
  <source src="./assets/music/saad-allem.mp3" type="audio/mpeg" preload="auto">
</audio>


<button id="playPauseButton"><i class="fa-solid fa-pause"></i></button>

<script>
  // Get the audio element and the play/pause button
  const music = document.getElementById('music');
  const playPauseButton = document.getElementById('playPauseButton');

  // Add event listener to the play/pause button
  playPauseButton.addEventListener('click', function() {
    if (music.paused) {
      // If music is paused, play it and change button text to "Pause"
      music.pause();
      playPauseButton.innerHTML = '<i class="fas fa-play"></i>';
    } else {
      // If music is playing, pause it and change button text to "Play"
      music.play();
      playPauseButton.innerHTML = '<i class="fas fa-pause"></i>';
    }
  });
</script>