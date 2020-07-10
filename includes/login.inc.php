<?php

session_start();

if (isset($_POST['submit'])) 
{
	include_once 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	//Error handler
	//Check for empty fields

	if (empty($uid) || empty($pwd)) 
	{
		header("Location: ../new.php?login=empty");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE user_name = '$uid'";
		$result = mysqli_query($conn,$sql);
		$resultcheck = mysqli_num_rows($result);

		if ($resultcheck < 1) 
		{
			header("Location: ../new.php?login=errorinvaliduser");
			exit();
		}
		else
		{
			if ($row = mysqli_fetch_assoc($result)) 
			{
				$hashedpwdcheck = password_verify($pwd, $row['user_pwd']);

				if ($hashedpwdcheck == false) 
				{
					header("Location: ../new.php?login=errorpwd");
					exit();
				}
				elseif ($hashedpwdcheck == true) 
				{
					$_SESSION['u_fname'] = $row['user_fullname'];
					$_SESSION['u_uid'] = $row['user_name'];
					$_SESSION['u_type'] = $row['user_type'];
					$_SESSION['u_gender'] = $row['user_gender'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_pnum'] = $row['user_phonenumber'];
					$_SESSION['u_address'] = $row['user_address'];
					$_SESSION['u_pwd'] = $row['user_pwd'];

					if ($_SESSION['u_type'] == "Admin") 
					{
						header("Location: ../rosteradmin.php?login=sucess");
						exit();
					}
					else
					{
						header("Location: ../rosteruser.php?login=sucess");
						exit();
					}
				}
			}
		}
	}
}
else
{
	header("Location: ../new.php?login=error");
	exit();
}