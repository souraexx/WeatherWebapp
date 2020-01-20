<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Umbrella | Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" href="./images/logo.png" type="image/ico">
</head>
<body>
  <div class="header">
      <img src="./images/logoEx.png">
  </div>
	 <div class="box">
     <h2>Login</h2>
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
      <div class="inputBox">
      <input type="text" name="username" required onkeyup="this.setAttribute('value', this.value);" value="">
      <label>Username</label>
        </div>
        <div class="inputBox">
        <input type="password" name="password" required value=""
             onkeyup="this.setAttribute('value', this.value);"
             pattern=".{8,}"
             title="Must have atleast 8 or more characters">
            <label>Password</label>
        </div>
    <div class="inputBox">
    <input type="submit" name="login_user" value="Log-In">
    </div>
    <p3>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p3>
  </form>
</div>
</body>
</html>
