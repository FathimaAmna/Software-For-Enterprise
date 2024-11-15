<?php
$title = 'Maths Game Page';
include './includes/header.php';
?>


<div class="container p-3 my-3 border">
  <div class="left-icon">
    <a href="./index.php"><i class="fa-solid fa-circle-left" style="color: #000000;"></i></a>
    Win this game to gain your life back
  </div>
  <div id="imageContainer"></div>
  <div class="container p-3 my-3 bg-dark text-white">
    <h1>What number is the tomato</h1>
    <div class="textbox-container">
      <div class="icon">
        <input type="text" id="numberInput" />
        <button onclick="checkText()">
          <img width="50" height="40" src="https://img.icons8.com/quill/50/enter-2.png" alt="enter-2" />
        </button>
      </div>
    </div>
  </div>
  <div id="timer">Time Left: <span id="countdown">30</span> seconds</div>
</div>



<?php include './includes/footer.php'; ?>