<?php
$title = 'Home Page';
include './includes/header.php';
?>

<!-- nav -->
<header class="header">
  <nav class="nav">
    <a href="#" class="nav_logo"><span>Tomato Jump</span> </a>
  </nav>
</header>


<!-- Home -->
<section class="home">
  <div class="btn-group-vertical">
    <a href="./game.php"><button class="button1">Play</button></a>

    <a href="./leaderboad.php"><button class="button1">Leader Board</button></a>
    <a href="./profile.php"><button class="button1">Profile</button></a>
    <a href="./logout.php"> <button class="button1" id="exitButton">Exit</button></a>
  </div>
</section>

<?php include './includes/footer.php'; ?>