<?php

//if (isset($_POST['logout']))
	//yes, someone clicked logout button
//{
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../index.php?logout=success");
	exit();
//}

//else
//{
//	header("Location: ../index.php?error=nousertologout");
//	exit();

//}


?>