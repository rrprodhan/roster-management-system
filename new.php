<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>

	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">

  <style type="text/css">
  	a { text-decoration: none; } 
    a:hover{ background-color:  #800080;}
  </style>
</head>

<body >
		<h1 style="color: black; font-weight: bold; text-align: center; font-family: Gadget;">
      Roster Management System 
    </h1>
	       
    <div class="box">

      <h2>Login</h2>
      
      <form action="includes/login.inc.php" method="POST">
      	<div class="inputBox">
      		<label style="color: white;"> Username </label>
          <br>
      		<input type="text" name="uid" required="">
      	</div>

      	<div class="inputBox">
      		<label style="color: white;"> Password </label>
          <br>
          <input type="password" name="pwd" required="">
      	</div>

      		<input type="submit" name="submit" value="submit"> <br><br>

      		<a href="registration.php">
            <label style="color: white; text-decoration: none;"> 
              click here for registration
            </label>
          </a>
      </form> 
    </div>
</body>
</html>