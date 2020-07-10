<?php  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>

	<style type="text/css">
		body
		{
			margin: 0;
			font-family: sans-serif;
			padding: cover;
	    	background-image:url(background-canvas-close-up-1020320.jpg); 
	    	background-size: cover;
	    }

		td
		{
		    color: white;
		}

	    h1
	    {
   	        color: black;
   	        text-align: center;
   	        font-weight: bold;
   	        background-color: rgb(176 196 222); 
	    }
	       
	    .box
	    {
       		position: absolute;
			top: 4%;
			left: 33%;
			bottom: 4%;
			transform: translate(-50%.-50%);
			width: 400px;
			background: rgba(0,0,0,.6 );
			padding: 30px;
			background-size: border-box;
			box-shadow: 025 250px 25px rgba(192,192,192,0.3);
			border-radius: 10px ;
			font-weight: bold;
	    }
	       
	    .box input
	    {
	       	width: 100%
			padding:10px 0;
			font-size: 15px;
			color: #fff;
			border: none;
			border-bottom: 1px solid #fff; 
			margin-bottom: 14px;
			background: transparent;
			outline: none;
	    }      
	</style>
</head>

<body >
    <div class="box">
        <form action="includes/signup.inc.php" method="POST">
         	<table>
	         	<tr>        		
	         		<td>Name</td>
	         		<tr><td><input type="text" name="fname" required=""></td></tr>
	         	</tr>
	         	<tr>
	         		<td>User name</td>
	         		<tr><td><input type="text" name="uid" required=""></td></tr>         		
	         	</tr>
	         	<tr>
	         		<td>User type</td>
	         		<tr><td><input type="text" name="utype" required=""></td></tr>         		
	         	</tr>
         		<tr>
         			<td>Gender</td>
         			<tr><td><input type="text" name="gender" required=""></td></tr>
         		</tr>
         		<tr>
         			<td>Email</td>
         			<tr><td><input type="Email" name="email" required=""></td></tr>
         		</tr>
         		<tr>
         			<td>Phon Numbere</td>
         			<tr><td><input type="Numbere" name="pnum" required=""></td></tr>
         		</tr>
         		<tr>
         			<td>Adress</td>
         			<tr><td><input type="text" name="address" required=""></td></tr>
         		</tr>
         		<tr>
         			<td>Password</td>
         			<tr><td><input type="Password" name="pwd" required=""></td></tr>
         		</tr>
         		<tr>	
         			<td><input type="Submit" name="submit" value="submit" font-size="10px"></td>
         		</tr>
         	</table>
        </form>
    </div>
</html>