<?php
	session_start();
	include("config.php");
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Skk</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/signcss.css">
 
 
 </head>
 <body>
	<div id="header">
	<h1>Sedin Technologies</h1> 
		
	</div>
 <div id="nav">
	
 
 </div>  
 <div id="container">
 <br><br><center style="color:green">
			<?php
				if(isset($_GET["mes"]))
				{
					echo $_GET["mes"];
				}
			?>
			</center>
	<h1 align="center"></h1>
		<fieldset id="user_login">
			<legend> User Login</legend>
				<form action="login.php" method="post" autocomplete="off">
					<table id="user_table">
						<tr> <td>Use Name </td><td><input type="text" name="name" required> </td>
						</tr>
						<tr> <td>Password  </td><td><input type="password" name="pass" required> </td>
						</tr>
						<tr>
						<td><input type="submit" value="Login" name="submit" id="sbtn"> </td>
						<td><input type="reset" value="Clear" id="rbtn"> </td>
						</tr><tr> 
							<td></td>
							<td><a href="new_user.php">New User Registration  </a> </td>
						</tr>
					</table>
				</form>
			
		</fieldset>
		<?php
			if(isset($_POST["submit"]))
			{ 
				$name=$_POST["name"];
				$pass=$_POST["pass"];
				if($name!=""&&$pass!="")
				{
					$sql="SELECT UID,USER_NAME,PASS FROM users WHERE USER_NAME='$name' AND PASS='$pass'";
					$result=$con->query($sql);
					//print_r($result);
					
					if($row=$result->fetch_assoc())
					{
						$_SESSION["name"]=$name;
						$_SESSION["id"]=$row["UID"];
						header("location:index.php");
					}
					else{
						echo "<p> Invalid User or Password</p>";
					}
				}
				else
				{
					echo "<p style='color:red'> please Enter Details</p>";
					
				}
			}
			else
			{
				//echo "<p>Please Fill The Details For Complete Access </p>";
			}
		
		?>
 
</div>
	<div id="footer">
	<center>Copyright &copy;2021 | Designed By Karthik </center>
	</div>
	</body>
</html>