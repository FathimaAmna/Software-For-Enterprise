<?php 
$title = 'Profile Page';
include './includes/header.php'; 
?>

<section class="home show">
  <div class="form_container active">
    <a href="./index.php"><i class="fa-solid fa-xmark form_close"></i></a>

    <div class="form login_form">
      <h2>Profile</h2>

      <div class="input_box">Username:<span>
          <?php echo $_SESSION["username"]; ?>
        </span>
      </div>

      <a href="./editProfile.php"><button class="button" name="signInBtn" id="signInBtn">
          Change username
        </button></a>
    </div>
  </div>
</section>

<?php include './includes/footer.php'; ?>