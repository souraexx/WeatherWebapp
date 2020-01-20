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
<html>
<head>
	<title>Redirecting</title>
</head>
<body>
  	<!-- Redirecting to weather -->
      <?php if (isset($_SESSION['success'])){
          header("location:city.php"); 
      } ?>	
</body>
</html>