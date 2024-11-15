<?php
$title = 'Edit profile Page';
include './includes/header.php'; ?>
<?php

// Check if error message session variable is set
if (isset($_SESSION["error_message"])) {
  // Display the error message
  echo '<div class="error">' . $_SESSION["error_message"] . '</div>';
  // Unset the error message session variable
  unset($_SESSION["error_message"]);
}
?>
<section class="home show">
  <div class="form_container active">
    <a href="./index.php"><i class="fa-solid fa-xmark form_close"></i></a>

    <div class="form login_form">
      <h2>Change Username</h2>



      <form action="./functions/ProfileHandler.php" method="post">

        <div class="input_box">

          <input type="text" name="txtName" value="<?php echo $_SESSION["username"]; ?>" required>
        </div>

        <button class="button" name="editUserBtn" id="editUserBtn">
          Update Username
        </button>
      </form>



    </div>
  </div>
</section>

<?php include './includes/footer.php'; ?>