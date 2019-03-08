<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "socialapp";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


//to test connection is working or not
/*
echo "Connection here";

$sql = "INSERT INTO users (user_fullname, user_username, user_emailid, user_mobileno, user_password) values ('asdad','asas1234','dasd@gmail.com','9090990909','test123456');";
mysqli_query($conn, $sql);

echo " Done";*/
?>