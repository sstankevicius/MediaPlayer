<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = New Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name){
  if (isset($_POST[$name])) {
    echo $_POST[$name];
  }
}
 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IRSHTVA</title>

    <link rel="stylesheet" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
  </head>
  <body>
    <?php
    if (isset($_POST['registerButton'])) {
      echo '<script>
      $(document).ready(function(){
        $("#loginForm").hide();
        $("#registerForm").show();
      });
      </script>';
    }
    else {
      echo '<script>
      $(document).ready(function(){
        $("#loginForm").show();
        $("#registerForm").hide();
      });
      </script>';
    }
     ?>

    <div id="background">
      <canvas id=c></canvas>
      <div id="loginContainer">

        <div id="inputContainer">
          <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your account</h2>
            <p>
              <?php echo $account->getError(Constants::$loginFailed ); ?>
              <label for="loginUsername">Username</label>
      <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('loginUsername') ?>" required>
            </p>
          <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
          </p>

          <button type="submit" name="loginButton">LOG IN</button>

          <div class="hasAccountText">
            <span id="hideLogin">Don't have an account yet? Signup here.</span>
          </div>

          </form>


          <form id="registerForm" action="register.php" method="POST">
            <h2>Creat your free account</h2>
            <p>
              <?php echo $account->getError(Constants::$usernameCharacters); ?>
              <?php echo $account->getError(Constants::$usernameTaken ); ?>
              <label for="username">Username</label>
      <input id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('username') ?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$firstNameCharacters); ?>
              <label for="firstname">First Name</label>
      <input id="firstname" name="firstname" type="text" placeholder="e.g. Bart" value="<?php getInputValue('firstname') ?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$lastNameCharacters); ?>
              <label for="lastname">Last name</label>
      <input id="lastname" name="lastname" type="text" placeholder="e.g. Simpson" value="<?php getInputValue('lastname') ?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
              <?php echo $account->getError(Constants::$emailInvalid); ?>
              <?php echo $account->getError(Constants::$emailTaken ); ?>
              <label for="email">Email</label>
      <input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email') ?>" required>
            </p>
            <p>
              <label for="email2">Confirm email</label>
      <input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email2') ?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
              <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
              <?php echo $account->getError(Constants::$passwordCharacters); ?>
              <label for="password">Password</label>
              <input id="password" name="password" type="password" placeholder="Your password" required>
            </p>
          <p>
            <label for="password2">Confirm password</label>
            <input id="password2" name="password2" type="password" placeholder="Your password"  required>
          </p>

          <button type="submit" name="registerButton">SIGN UP</button>

          <div class="hasAccountText">
            <span id="hideRegister">Already have an account? Log in here.</span>
          </div>

          </form>


        </div>

      </div>
  </div>
<script src="assets/js/background.js">

</script>
  </body>
</html>
