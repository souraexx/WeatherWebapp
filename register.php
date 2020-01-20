<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Umbrella | Register</title>
  <link rel="stylesheet" type="text/css" href="style.css"> 
  <link rel="icon" href="./images/logo.png" type="image/ico">
</head>
<body>
  <div class="header2">
  <img src="./images/logoEx.png">
  </div>
<div class="box">
  <h2>Register</h2>
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="inputBox">
      <input type="text" name="username" required onkeyup="this.setAttribute('value', this.value);" value="<?php echo $username; ?>">
  	  <label>Username</label>
  	</div>
  	<div class="inputBox">
      <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);" value="<?php echo $email; ?>">
  	  <label>Email</label>
  	</div>
  	<div class="inputBox">
      <input type="password" name="password_1" required value=""
             onkeyup="this.setAttribute('value', this.value);"
             pattern=".{8,}"
             title="Must have atleast 8 or more characters">
  	  <label>Password</label>
  	</div>
  	<div class="inputBox">
      <input type="password" name="password_2" required value=""
             onkeyup="this.setAttribute('value', this.value);"
             pattern=".{8,}"
             title="Must have atleast 8 or more characters">
  	  <label>Confirm password</label>
  	</div>
  	<div class="inputBox">
      <input type="submit" name="reg_user" value="Sign-Up">
  	</div>
  	<p3>
  		Already a member? <a href="login.php">Log in</a>
  	</p3>
  </form>
  </div>
</body>
</html>