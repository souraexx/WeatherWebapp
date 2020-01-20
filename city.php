<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Umbrella | Search</title>
	<link rel="icon" href="./images/logo.png" type="image/ico">
    <link rel="stylesheet" href="styles.css">
</head>
	<body>
		<a href="./about.php">
		<img  alt="About" src="./images/logo.png" style=" height:50px; width:auto; float:left; margin-top:35px; margin-left:30px; "></a>
		<a href="index.php?logout='1'">
		<img  alt="Logout" src="./images/logout.png" style=" height:35px; width:35px; float:right; margin-top:35px; margin-right:30px; "></a>
    	<form method="GET" action="weatherData.html">
    		<div class="container">
				<div class="search-box">
					<input id="myInput" name="city" type="text" placeholder="">
					<span></span>
				</div>
			</div>
		</form>
		<?php  if (isset($_SESSION['username'])) : ?>
		<p style="color:white; position: absolute;
                left: 50%;
                top: 34%;
                transform: translateX(-50%) translateY(-50%);
                text-align: center;
				font-size: 3.3em;text-shadow: 1px 1px 1px #000;">Hi <?php echo $_SESSION['username']; ?>,</p>
		<?php endif ?>
		<p style="color:white; position: absolute;
                left: 50%;
                top: 40%;
                transform: translateX(-50%) translateY(-50%);
                text-align: center;
				font-size: 3em; text-shadow: 1px 1px 1px #000;">Write the name of the city!</p>
		<script>
			function activatePlaces() {
				var input = document.getElementById('myInput');
				var autocomplete = new google.maps.places.Autocomplete(input);
				}
			</script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGMWYdPgwU2UkzHH8bey-qhuUYlm79SJo&libraries=places&callback=activatePlaces" async defer></script>
	</body>
	</html>
