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
 #stn,#img
 {
	 width:300px;
	 height:30px;
	 border-radius:5px;
	 font-size:18px;
	 color:blue;
 }
 #txt{
	  width:300px;
	 height:50px;
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
		<li> <a href="logout.php">Log Out</a> </li>

	</ul>
	</center>
 
 </div>  
 <div id="container" align="center">
 <?php
						if(isset($_POST["submit"]))
						{
							$uid=$_SESSION["id"];
							$target="images/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sql="INSERT INTO `images` (`IMG_ID`, `U_ID`, `IMGTEXT`, `IMAGE`, `TIME`) VALUES (NULL, '$uid', '{$_POST["text"]}', '$target_file', NOW())";
								$con->query($sql);
								echo "<div style='color:green'>Insert Success</div>";
							}
							
						}
					
					
					?>
  
 <form  enctype="multipart/form-data" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<table id="user_table">
		<tr><td><label>Some text on your Post</label><br>
		<textarea rows="3" name="text" id="txt"></textarea><br><br></td></tr>
		<tr><td>
		<label> Image</label><br>
		<input type="file"  class="input3" required name="img" id="img"><br><br>
		</td></tr>
		<tr><td>
		<button type="submit" class="btn" name="submit" id="stn">Post </button>
		</td></tr>
		</table>
</form>




</div>
	<div id="footer">
	<center>Copyright &copy;2021 | Designed By Karthik </center>
	</div>
	</body>
</html>