<?php


//check if someone clicked submit button
if (isset($_POST["signup"]))
	//yes, someone clicked submit button
{

	require 'dbConnection.php';

	$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$emailid = mysqli_real_escape_string($conn, $_POST['emailid']);
	$mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
	//Error Handlers
	if( $password != $confirmpassword)
	{
		header("Location: ../index.php?signup=passwordmismatch&fullname=".$fullname."&username=".$username."&emaildid=".$emailid);
	}
	else
	{
		//check if username already exists
		$sql = "SELECT * FROM users WHERE user_username=? or user_emailid=?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			//checking for sql error
			header("Location: ../index.php?signup=sqlerror");
			exit();
		}
		else
		{

			mysqli_stmt_bind_param($stmt,"ss",$username,$emailid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0)
			{
				//if username or email is already existing
				header("Location: ../index.php?signup=usertaken&emailid=".$emaildid);
				exit();
			}

			else
			{

				//Insert user details into the database
				$sql = "INSERT INTO users (user_fullname, user_username, user_emailid, user_mobileno, user_password) VALUES (?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql))
				{
					//checking for sql error
					header("Location: ../index.php?signup=sqlerror");
					exit();
				}
				else
				{

					//Hashing the password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt,"sssss",$fullname,$username,$emailid,$mobileno,$hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: ../index.php?signup=success");
					exit();

				}

			}									
		}

	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
//submit button not clicked instead they typed in signup.php url directly in browser
else
{
	//send the page back to index.php
	#header("Location: ../index.php");
	#exit();
}


?>