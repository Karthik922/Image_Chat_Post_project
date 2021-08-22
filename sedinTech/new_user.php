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
 <script src="jquery-3.4.1.min.js"></script>
 <script>
 $(document).ready(function(){
	 
	 $("#p2").bind("blur",password_check);
	 $("#uname_id").keyup(function(){
		 $.post("check_user.php",{name:frm.uname.value},function(data){
			 $("#feedback").html(data)
		 });
	 });
 });
 function password_check()
	 {
		var p1=$("#p1").val();
		var p2=$("#p2").val();
			if(p1!=p2)
			{
				$("#pass_err").html("MisMatch Password");
			}
			else
			{	$("#pass_err").html(" ");
				$("#pass_crr").html("Match Password");
			}	
	 }
 </script>
 </head>
 <body>
	<div id="header">
	<h1>Sedin Technologies</h1> 
		
	</div>
 <div id="nav">

 
 </div>  
<div id="container">
	
		<fieldset id="user_login">
			<legend>New User</legend>
			<span id="feedback" style="margin:10px;"><?php 
				if(isset($_GET["err"]))
				{
					echo "<p style='color:red'>".$_GET['err']."</p>";
				}
			?></span>
				<form method="post" action="new_user.php" name="frm" autocomplete="off">
					<table id="user_table">
						<tr> 
							<td>Name </td>
							<td><input type="text" name="name" required> </td>
						</tr>
						<tr>
							<td>User Name </td>
							<td><input type="text" name="uname" id="uname_id" required> </td>
						</tr>
						<tr> 
							<td>Email  </td>
							<td><input type="email" name="email" required> </td>
						</tr>
						<tr> <td>Password  </td>
							<td><input type="password" name="pass1" id="p1" required> </td>
							<td>
							<i class="error" id="pass_err" style="color:red"></i>
							<i class="correct" id="pass_crr" style="color:green"></i>

							</td>
						</tr>
						<tr>	 <td>Confirm Password  </td>
								<td><input type="password" name="pass2" id="p2" required> </td>
						</tr>
						
						
						<tr> 
							<td><input type="submit" value="Save" id="sbtn" name="submit"> </td>
							<td><input type="reset" value="Clear" id="rbtn"> </td>
						</tr>
						<tr> <td></td>
							 <td><a href="login.php">Already User  </a> </td>
						
						</tr>
					</table>
				</form>
			
		</fieldset>
		<?php
		if(isset($_POST["submit"]))
		{
			$name=$_POST["name"];
			$uname=$_POST["uname"];
			$email=$_POST["email"];
			$pass1=$_POST["pass1"];
			$pass2=$_POST["pass2"];
			
			if($name!=""&&$uname!=""&&$email!=""&&$pass1!=""&&$pass2!="")
			{
				if($pass1==$pass2)
				{
					$sql="INSERT INTO `users` (`UID`, `NAME`, `USER_NAME`, `EMAIL`, `PASS`) VALUES (NULL, '$name', '$uname', '$email', '$pass1')";
					if($con->query($sql))
					{
						echo "";
						header("location:login.php?mes=<p class='corect'> Member you Are Joined to Sedin Technologies Please Login Here</p>"); 
					}
					else
					{
						echo "<p class='error'>Some error try again later</p>";
						
					}
				}
				else
				{
					echo "<p class='error'>Confirm Password and Password Must Same.</p>";
				}
				
			}
			else
			{
				echo "<p class='error'> All Fields Required </p>";
			}
		}
		else
		{
			echo "<p>Please fill All the message </p>";
			
		}
			
		?>
		
</div>
	<div id="footer">
	<center>Copyright &copy;2021 | Designed By Karthik </center>
	</div>
	</body>
</html>