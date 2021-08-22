<?php
session_start();
	include("config.php");
	if(!isset($_SESSION['id']))
	{
	header("location:login.php?mes=<p>Please Login Here</p>"); 
	}
$res=$con->query("INSERT INTO `comments` (`CID`, `IMGID`, `UNAME`, `COMMENTS`) VALUES (NULL, '{$_POST["imid"]}', '{$_POST["na"]}', '{$_POST["me"]}',NOW())");


//insert into comments (NAME,MESS,LOGS) value ('{$_POST["na"]}','{$_POST["me"]}',NOW())
?>

