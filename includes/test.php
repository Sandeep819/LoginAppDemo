<?php

echo("Hello this is the starting");
echo 2+4;




	require 'dbConnection.php';

	$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$emailid = mysqli_real_escape_string($conn, $_POST['emailid']);
	$mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

	echo "Hello There";


	//send the page back to index.php
	#header("Location: ../index.php?test.php.loginerror");
	#exit();


?>