<?php
$title = 'login Page';
include './includes/header.php'; ?>

<!-- Home -->
<section class="home show">
  <div class="form_container active">
    <a href="./index.php"><i class="fa-solid fa-xmark form_close"></i></a>
    <!-- Login From -->
    <div class="form login_form">
      <form action="functions/loginHandler.php" method="post">
        <h2>Login</h2>

        <div class="input_box">
          <input type="text" placeholder="Enter your username" required id="txtName" name="txtName" />
          <i class="fa-regular fa-user email"></i>

        </div>
        <div class="input_box">
          <input type="password" placeholder="Enter your password" required id="txtPassword" name="txtPassword" />
          <i class="fa-solid fa-lock password"></i>

        </div>

        <button class="button" name="signInBtn" id="signInBtn">
          Login Now
        </button>

        <div class="login_signup">
          Don't have an account?
          <a href="registration.php">Signup</a>
        </div>
      </form>
    </div>
  </div>
</section>

<?php include './includes/footer.php'; ?>