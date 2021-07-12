<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
  $account = new Account($con);
  
  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  function getInputValue($name){
    if (isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }


?>


 

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Welcome to Slotify</title>
    <link rel="stylesheet" href="assets/css/register.css" />
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
  </head>
 
 
  <body >
   <?php

    if(isset($_POST['RegisterButton'])){
      echo '<script>
              $(document).ready(function () {
              $("#loginForm").hide();
              $("#registerForm").show();
              });
            </script>';
    }else{
       echo '<script>
              $(document).ready(function () {
              $("#loginForm").show();
              $("#registerForm").hide();
              });
            </script>';
    }
  
  ?>

    <div id="background">
      <div id="loginContainer">
        <div id="inputContainer">
          <form action="register.php" id="loginForm" method="POST">
            <h2>Login to Your Account</h2>
            <p>
              <?php
                echo $account->getError(Constants::$loginFailed); ?>
              <label for="loginUserName">Username: </label>
              <input
                type="text"
                id="loginUserName"
                name="loginUserName"
                placeholder="eg. Naeem"
                value="<?php getInputValue('loginUserName') ?>"
                required
              />
            </p>
            <p>
              <label for="loginPassword">Password: </label>
              <input
                type="password"
                id="loginPassword"
                name="loginPassword"
                placeholder="Your Password"
                required
              />
            </p>
            <button type="submit" name="LoginButton">Log in</button>
            <div class="hasAccountText">
              <span id="hideLogin">
                Don't Have an Account yet? Sign Up Here.
              </span>
            </div>
          </form>

          <form action="register.php" id="registerForm" method="POST">
            <h2>Create Your Free Account</h2>
            <p>
              <?php
                echo $account->getError(Constants::$userNameCharacters); ?>
              <?php
                echo $account->getError(Constants::$userNameTaken); ?>
              <label for="userName">Username: </label>
              <input
                type="text"
                id="userName"
                name="userName"
                placeholder="eg. Naeem"
                value="<?php getInputValue('userName') ?>"
                required
              />
            </p>
            <p>
              <?php
                echo $account->getError(Constants::$firstNameCharacters); ?>
              <label for="firstName">Firstname: </label>
              <input
                type="text"
                id="firstName"
                name="firstName"
                placeholder="eg. Naeem"
                value="<?php getInputValue('firstName') ?>"
                required
              />
            </p>

            <p>
              <?php
                echo $account->getError(Constants::$lastNameCharacters); ?>
              <label for="lastName">Lastname: </label>
              <input
                type="text"
                id="lastName"
                name="lastName"
                placeholder="eg. Ghadai"
                value="<?php getInputValue('lastName') ?>"
                required
              />
            </p>

            <p>
              <?php
                echo $account->getError(Constants::$emailDoNotMatch); ?>
              <?php
                echo $account->getError(Constants::$emailInvalid); ?>
              <?php
                echo $account->getError(Constants::$userEmailTaken); ?>
              <label for="email">Email: </label>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="eg. naeem@gmail.com"
                value="<?php getInputValue('email') ?>"
                required
              />
            </p>

            <p>
              <label for="email2">Confirm Email: </label>
              <input
                type="email"
                id="email2"
                name="email2"
                placeholder="eg. naeem@gmail.com"
                value="<?php getInputValue('email2') ?>"
                required
              />
            </p>

            <p>
              <?php
                echo $account->getError(Constants::$passwordDoNotMatch); ?>
              <?php
                echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
              <?php
                echo $account->getError(Constants::$passwordCharacters); ?>
              <label for="Password">Password: </label>
              <input
                type="password"
                id="Password"
                name="Password"
                placeholder="Your Password"
                required
              />
            </p>

            <p>
              <label for="Password2">Confirm Password: </label>
              <input
                type="password"
                id="Password2"
                name="Password2"
                placeholder="Your Password"
                required
              />
            </p>
            <button type="submit" name="RegisterButton">Sign Up</button>

            <div class="hasAccountText">
              <span id="hideRegister">
                Already Have an Account yet? Sign In Here.
              </span>
            </div>
          </form>
        </div>
        
        <div id="loginText">
          <h1>Get Great Music, Right Now</h1>
          <h2>Listen To Loads Of Songs For Free</h2>

          <ul>
              <li>Discover Music You Will Fall in LOVE With</li>
              <li>Create Your Own Playlist</li>
              <li>Follow Artists to Keep up to Date</li>

          </ul>
        </div>
      
      </div>
    </div>
  
  </body>
</html>
