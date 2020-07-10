<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Roster</title>
	<style type="text/css">
		body {
			margin: 0;
			font-family: sans-serif;
			padding: cover;
	    	background-image:url(background-canvas-close-up-1020320.jpg); 
	    	background-size: cover;
		}
		.shihab button:hover{
			background-color:#C0C0C0; 
		}
		.shihab{
			position: absolute;			
			top: 0%;
			right:  2% ;
			font-size: 50px;
		}

		.userinfo{
			position: absolute;			
			top: 5%;
			right:  7.5% ;
			font-size: 15px;
		}
		
		.roster h2{
			color: #000000;
		}
		.roster{
			position:relative;
			font-size: 20px; 
			font-family: ;
			padding-left: 600px;
			color: black; 
			font-weight: bold; 
			font-family: Gadget;

		}
		.table button:hover{
			background-color:#C0C0C0;  
		}
		
		.table option{
			background-color:#C0C0C0;  
		}

		.box1
	    {
       		position: absolute;
			top: 20%;
			left: 31%;
			bottom: 9%;
			transform: translate(-50%.-50%);
			width: 1000px;
			background: rgba(0,0,0,0);
			padding: 30px;
			background-size: border-box;
			box-shadow: 025 250px 25px rgba(192,192,192,0.3);
			border-radius: 10px ;
			color: black;
			
			font-family: cursive;
	    }
	</style>

</head>
<body>
	<div class="roster">
		<h2 >Roster</h2>
	</div>

	<div class="userinfo">
		<?php  
			echo "<b>".$_SESSION['u_uid']."</b> | <b>".$_SESSION['u_type']."</b>";
		?>
	</div>

	<div class="shihab">
		<form action="includes/logout.inc.php" method="POST">
			<button type="submit" name="submit" 
					style="position: relative; 
						   font-size: 17px; 
						   font-weight: normal;
						   color: #000000;">
						logout
			</button>
		</form>
	</div>

	<?php 

		$n = $_SESSION['u_uid'];

		include_once 'includes/dbh.inc.php';
	
		$sql3 = "SELECT roster.user_name, roster.shift_time, roster.day FROM roster WHERE roster.user_name = '$n' ORDER BY user_name";
		$result3 = $conn -> query($sql3);

		echo "<div class = 'box2'>";
		echo "</div>";

		echo "<div class = 'box1'>";
		echo "<table cellspacing='3' cellpading='5' width='45%'>";

		if ($result3 -> num_rows > 0) 
		{
			echo "<tr><td>Username</td><td>Shift Time</td><td>Day</td></tr>";

			while ($row3 = $result3 -> fetch_assoc()) 
			{
				echo "<tr>";
					echo "<td>{$row3['user_name']}</td>";
					echo "<td>{$row3['shift_time']}</td>";
					echo "<td>{$row3['day']}</td>";
				echo "</tr>";
			}

			echo "</table>";
			echo "</div>";
		}
		else
		{
			echo "No results found.";
		}
	?>
</body>
</html>