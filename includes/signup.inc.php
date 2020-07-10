<?php

if (isset($_POST['submit'])) 
{
	include_once 'dbh.inc.php';

	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$utype = mysqli_real_escape_string($conn,$_POST['utype']);
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pnum = mysqli_real_escape_string($conn,$_POST['pnum']);
	$address = mysqli_real_escape_string($conn,$_POST['address']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	//Error handler
	//Check for empty fields

	if (empty($fname) || empty($uid) || empty($utype) || empty($gender) || empty($email) || empty($pnum) || empty($address) || empty($pwd)) 
	{
		header("Location: ../registration.php?registration=empty");
		exit();
	}
	else
	{
		//Check if input characters are valid

		if (preg_match("/^[a-zA-Z]*$/", $pnum)) 
		{	
			header("Location: ../registration.php?registration=invalidnumber");
			exit();
		}
		else
		{
			$sql = "SELECT * FROM users WHERE user_name = '$uid'";
			$result = mysqli_query($conn,$sql);
			$resultcheck = mysqli_num_rows($result);

			if ($resultcheck > 0) 
			{
				header("Location: ../registration.php?registration=usertaken");
				exit();
			}
			else
			{
				//Hashing the password

				$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

				//Insert the user into the database

				$sql = "INSERT INTO users (user_fullname, user_name, user_gender, user_email, user_phonenumber, user_address, user_pwd, user_type) VALUES ('$fname', '$uid', '$gender', '$email', $pnum, '$address', '$hashedpwd', '$utype');";

				mysqli_query($conn, $sql);

				header("Location: ../new.php?registration=success");
				exit();
			}
		}
	}
} 
else 
{
	header("Location: ../registration.php");
	exit();
}