<?php  

if(isset($_POST['submit']))
{
	include_once 'dbh.inc.php';

	$ename = mysqli_real_escape_string($conn,$_POST['ename']);
	$time = mysqli_real_escape_string($conn,$_POST['time']);
	$day = mysqli_real_escape_string($conn,$_POST['day']);

	if (empty($ename) || empty($time) || empty($day))
	{
		header("Location: ../rosteradmin.php?input=empty");
		exit();
	}
	else
	{
		/*$sql = "DELETE FROM users WHERE user_name = '$ename'";
		mysqli_query($conn,$sql);*/
		$sql2 = "DELETE FROM roster WHERE user_name = '$ename' AND shift_time = '$time' AND day = '$day'";
		mysqli_query($conn,$sql2);

		header("Location: ../rosteradmin.php?update=success");
		exit();
	}		
}
else
{
	header("Location: ../rosteradmin.php?input=error");
	exit();
}