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
 th, td {
  padding: 15px;
  text-align: left;
}
tr:hover {background-color:#cc0099;}
#stn
 {
	 width:300px;
	 height:30px;
	 border-radius:5px;
	 font-size:18px;
	 color:blue;
 }
 #pass1,#pass2{
	  width:300px;
	 height:40px;
	 border-radius:5px;
	 font-size:18px;
	 color:blue;
	 
 }
 #stn:hover{
	 background:#5eaeff;
 }
 #stn:active{
	 background:yellow;
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
 <?php
			if(isset($_POST["submit"]))
			{
				$sql="SELECT * FROM `users` WHERE PASS='{$_POST["opass"]}' and UID='{$_SESSION["id"]}'";
				$res=$con->query($sql);
				if($res->num_rows>0)
				{
					$s="update `users` set PASS='{$_POST["npass"]}' where UID='{$_SESSION["id"]}'";
					$con->query($s);
					echo "<div style='color:green'>Password Changed</div>"; 
					
				}
				else
				{
					
					echo "<div style='color:red'>Invalid Password</div>";
							
				}
			}
			?>
     <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<table id="">
				<tr><td><label>Old Password</label>&nbsp&nbsp
				<input type="password" name="opass" id="pass1" required >
				</td></tr>
				<br>
				<tr><td>
				<label>New Password</label>&nbsp
				<input type="password" name="npass" id="pass2" required >
				</td></tr>
				<br><br>
				<tr><td>
				<button type="submit" name="submit" id="stn">Update Password</button>
					</td></tr>
		</table>
		</form>
 
 
 
 </center>
</div>
	<div id="footer">
	<center>Copyright &copy;2021 | Designed By Karthik </center>
	</div>
	</body>
</html>