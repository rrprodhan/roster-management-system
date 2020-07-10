<?php  

if(isset($_POST['submit']))
{
	include_once 'dbh.inc.php';

	$ename = mysqli_real_escape_string($conn,$_POST['ename']);

	if (empty($ename))
	{
		header("Location: ../rosteradmin.php?input=empty");
		exit();
	}
	else
	{
		$sql = "DELETE FROM users WHERE user_name = '$ename'";
		mysqli_query($conn,$sql);

		$sql2 = "DELETE FROM roster WHERE user_name = '$ename'";
		mysqli_query($conn,$sql2);

		header("Location: ../rosteradmin.php?delete=success");
		exit();
	}		
}
else
{
	header("Location: ../rosteradmin.php?input=error");
	exit();
}