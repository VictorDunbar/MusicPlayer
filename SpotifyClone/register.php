<?php
  include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
?>

<html>
<head>
	<title>Welcome to Slotify!</title>

  <link rel="stylesheet" type="text/css" href="assets/css/register.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>

</head>
<body>
  <?php
    if(isset($_POST['registerButton'])) {
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

    <div id="loginContainer">

      <div id="inputContainer">
    		<form id="loginForm" action="register.php" method="POST">
    			<h2>Login to your account</h2>
    			<p>
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <br>
    				<label for="loginUsername">Username:</label>
    				<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('loginUsername') ?>" required>
    			</p>
    			<p>
    				<label for="loginPassword">Password:</label>
    				<input id="loginPassword" name="loginPassword" type="password" placeholder="Enter password" required>
    			</p>

    			<button type="submit" name="loginButton">LOG IN</button>

          <div class="hasAccountText">
            <span id="hideLogin"> Don't have an account yet? Sign Up here!</span>
          </div>

    		</form>



    		<form id="registerForm" action="register.php" method="POST">
    			<h2>Create your free account</h2>
    			<p>
    				<?php echo $account->getError(Constants::$usernameCharacters); ?>
            <?php echo $account->getError(Constants::$usernameTaken); ?>
    				<label for="username">Username:</label>
    				<input id="username" name="username" type="text" placeholder="e.g. FirstLast" value="<?php getInputValue('username') ?>" required>
    			</p>

    			<p>
    				<?php echo $account->getError(Constants::$firstNameCharacters); ?>
    				<label for="firstName">First name:</label>
    				<input id="firstName" name="firstName" type="text" placeholder="e.g. First" value="<?php getInputValue('firstName') ?>" required>
    			</p>

    			<p>
    				<?php echo $account->getError(Constants::$lastNameCharacters); ?>
    				<label for="lastName">Last name:</label>
    				<input id="lastName" name="lastName" type="text" placeholder="e.g. Last" value="<?php getInputValue('lastName') ?>" required>
    			</p>

    			<p>
    				<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
    				<?php echo $account->getError(Constants::$emailInvalid); ?>
            <?php echo $account->getError(Constants::$emailTaken); ?>
    				<label for="email">Email:</label>
    				<input id="email" name="email" type="email" placeholder="e.g. First@gmail.com" value="<?php getInputValue('email') ?>" required>
    			</p>

    			<p>
    				<label for="email2">Confirm email:</label>
    				<input id="email2" name="email2" type="email" placeholder="e.g. Last@gmail.com" value="<?php getInputValue('email2') ?>"  required>
    			</p>

    			<p>
    				<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
    				<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
    				<?php echo $account->getError(Constants::$passwordCharacters); ?>
    				<label for="password">Password:</label>
    				<input id="password" name="password" type="password" placeholder="Your password" required>
    			</p>

    			<p>
    				<label for="password2">Confirm password:</label>
    				<input id="password2" name="password2" type="password" placeholder="Your password" required>
    			</p>
    			<button type="submit" name="registerButton">SIGN UP!</button>

          <div class="hasAccountText">
            <span id="hideRegister">Already have an account? Sign in here</span>
          </div>

    		</form>
    	</div>
      <div id="loginText">
        <h1>Great music, right now</h1>
        <h2>Listen to a ton of music for free!<h2>
        <ul>
          <li>Discover music you've never heard before!</li>
          <li>Create and download playlists!</li>
          <li>Follow Artists and stations to keep up to date!</li>
        </ul>
      </div>

    </div>

  </div>

</body>
</html>
