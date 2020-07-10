<?php

if(isset($_POST['submit'])) 
{
	include_once 'dbh.inc.php';

	$ename = mysqli_real_escape_string($conn,$_POST['ename']);
	$time = mysqli_real_escape_string($conn,$_POST['time']);
	$day = mysqli_real_escape_string($conn,$_POST['day']);

	//Error handler
	//Check for empty fields

	if (empty($ename) || empty($time) || empty($day)) 
	{
		header("Location: ../rosteradmin.php?inputdata=empty");
		exit();
	}
	else
	{
		$sql = "SELECT users.user_name FROM users WHERE users.user_name = '$ename'";
		$result = mysqli_query($conn,$sql);
		$resultcheck = mysqli_num_rows($result);

		if ($resultcheck < 1) 
		{
			header("Location: ../rosteradmin.php?usernameinfo=doesnotexist");
			exit();
		}
		else
		{
			$sql2 = "SELECT * FROM roster WHERE user_name='$ename' AND roster.day = '$day'";
			$result2 = mysqli_query($conn,$sql2);
			$resultcheck2 = mysqli_num_rows($result2);
			
			if ($resultcheck2 < 1) {
				$sql2 = "INSERT INTO roster (user_name, shift_time, day) VALUES ('$ename', '$time', '$day')";

				mysqli_query($conn, $sql2);

				header("Location: ../rosteradmin.php?insertdata=success");
				exit();
			}
			else
			{
				$sql2 = "UPDATE roster 
						SET shift_time='$time' 
						WHERE roster.user_name='$ename' AND roster.day = '$day'";

				mysqli_query($conn, $sql2);

				header("Location: ../rosteradmin.php?updatedata=success");
				exit();
			}
			
		}
	}
} 
else 
{
	header("Location: ../rosteradmin.php?input=error");
	exit();
}