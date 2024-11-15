<?php 
$title = 'Registration Page'; 
include './includes/header.php'; ?>

<!-- Home -->
<section class="home show">
  <div class="form_container active">
    <a href="./index.php"><i class="fa-solid fa-xmark form_close"></i></a>
    <!-- Login From -->
    <div class="form login_form">
      <form action="./functions/loginHandler.php" method="post" onsubmit="return validate();">
        <h2>Signup</h2>

        <div class="input_box">
          <input type="text" placeholder="Enter your username" required name="txtName" id="txtName" />
          <i class="fa-regular fa-user email"></i>
        </div>
        <div class="input_box">
          <input type="password" placeholder="Password" required name="txtPassword" id="txtPassword" />
          <i class="fa-solid fa-lock password"></i>

        </div>
        <div class="input_box">
          <input type="password" placeholder="Confirm password" required name="txtConfirmPassword"
            id="txtConfirmPassword" />
          <i class="fa-solid fa-lock password"></i>

        </div>

        <button name="signUpBtn" id="signUpBtn" class="button">Signup</button>

        <div class="login_signup">
          Already have an account?
          <a href="login.php">Signin</a>
        </div>
      </form>
    </div>
  </div>
</section>

<?php include './includes/footer.php'; ?>