<?php
	session_start();
	include("config.php");
	if(!isset($_SESSION['id']))
	{
	header("location:login.php?mes=<p>Please Login Here</p>"); 
	}
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Skk</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/signcss.css">
 <style>
 table {
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
tr:hover {background-color:#cc0099;}
 </style>
 
 </head>
 <body>
	<div id="header">
	<h1>Sedin Technologies</h1> 
		
	</div>
 <div id="nav">
	<center>
		<ul id="navul">
		<li> <a href="index.php"> Home</a> </li>
		<li> <a href="post.php">Post </a> </li>
		<li> <a href="profile.php">Profile </a> </li>
		<li> <a href="changepass.php">Change Password</a> </li>
		<li> <a href="logout.php">Log Out</a> </li>

	</ul>
	</center>
 
 </div>  
 <div id="container">
 <center>
 <br><br><br>
 <table border="1">
 <tr><th>UID</th><th>NAME</th><th>USER NAME</th><th>Email</th><th>Password</th></tr>
 <?php
 //echo $_SESSION["name"];
 $sql="SELECT * FROM users WHERE UID='{$_SESSION["id"]}'";
 $res=$con->query($sql);
 if($row=$res->fetch_assoc())
 {
	 echo "<tr><td>{$row["UID"]}</td><td>{$row["NAME"]}</td><td>{$row["USER_NAME"]}</td><td>{$row["EMAIL"]}</td><td>{$row["PASS"]}</td></tr>";
 }
 
 
 ?>
 </table>
 </center>
</div>
	<div id="footer">
	<center>Copyright &copy;2021 | Designed By Karthik </center>
	</div>
	</body>
</html>