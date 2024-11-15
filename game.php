<?php
$title = 'Game Page';
include './includes/header.php';
include './configs/database.php';

?>

<style>
  .icon i {
    font-size: 30px;
    padding: 0 5px;
  }

  .icon .fa-heart {
    color: #fff;
  }
</style>
<header class="header">
  <nav class="nav">
    <a href="./index.php"><i class="fa-solid fa-circle-left" style="color: #000000;"></i></a>

    <div class="icon"></div>
    <!-- heart lifes -->

    <a href="#" class="nav_logo"><span>Tomato Jump</span></a>
  </nav>
</header>
<br>

<?php
$user_id = $_SESSION["user_id"];

// Query the database to fetch the user's heart value
$sql = "SELECT heart FROM user WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($heart);
$stmt->fetch();
$stmt->close();
if ($heart > 0) {
  ?>
  <div class="world" data-world>
    <div class="score" data-score>0</div>
    <div class="start-screen" data-start-screen>Press Any Key To Start</div>
    <img src="./assets/imgs/ground.png" class="ground" data-ground />
    <img src="./assets/imgs/ground.png" class="ground" data-ground />
    <img src="./assets/imgs/man-stationary.png" class="man" data-man />
  </div>
  <?php
} else {
  ?>

  <?php
  if (isset($_SESSION["user_id"])) {
    // Get user_id from session
    $user_id = $_SESSION["user_id"];

    // Fetch the heart refill timer from the database
    $sql = "SELECT heart_refill_timer FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($heart_refill_timer);
    $stmt->fetch();
    $stmt->close();

  }
  ?>
  <section class="home show">
    <div class="form_container active">
      <a href="./index.php"><i class="uil uil-times form_close"></i></a>

      <div class="form login_form">


        <h1 class="text-center">No Heart Available</h1>

        <h3>Wait for <span id="countdown"></span></h3>

        <div class="container">
          <img src="./assets/imgs/game_over.jpg" alt="Game Over" class="game-over-img">
          Do you want your Life back now ?
          <div class="icon">
            <i class="fa-solid fa-share"></i>
            <a href="./mathsGame.php" class="button">Click Me</a>
            <i class="fa-solid fa-share fa-flip-horizontal"></i>
          </div>

        </div>

      </div>
    </div>
  </section>
  <?php
}
?>

<?php include './includes/footer.php'; ?>