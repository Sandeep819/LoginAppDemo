<?php


//check if someone clicked submit button
if (isset($_POST['login']))
	//yes, someone clicked submit button
{

	require "dbConnection.php";

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	//check for the username or email typed by user
	$sql = "SELECT * FROM users WHERE user_username=? OR user_emailid=?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		//checking for sql error
		header("Location: ../index.php?error=sqlerror");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "ss", $username, $email);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if ($row = mysqli_fetch_assoc($result) )
		{
			//De-Hashing the password
			$usernameCheck = $row['user_username'];
			$hashedPwdCheck = password_verify($password, $row['user_password']);
			if($username != $usernameCheck or $hashedPwdCheck == false)
			{
				header("Location: ../index.php?error=invalidpasswordorusername");
				exit();
			}
			elseif ($hashedPwdCheck == true and $usernameCheck == $username) 
			{
				//Log in the user here, remember just to save insensitive data
				session_start();

				$_SESSION['userId'] = $row['user_id'];
				$_SESSION['username'] = $row['user_username'];
				header("Location: ../index.php?login=success");
				exit();
			}
			else
			{
				header("Location: ../index.php?error=invalidpasswordorusername");
				exit();
			}
		}
		else
		{
			header("Location: ../index.php?error=invalidpasswordorusername");
			exit();
		}

	}

}
//submit button not clicked instead they typed in login.php url directly in browser
else
{
	//send the page back to index.php
	header("Location: ../index.php?error=nouser");
	exit();
}

?>