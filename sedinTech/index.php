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
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/signcss.css">
 <style>
 #imgtable
 {
	overflow:auto;
	margin-top:20px;
	margin-left:55px;
	width:650px;
	height:450px;
	background:#ffb3ff;
	color:white;
	font-size:18px;
	padding:20px;
	font-wight:bold;
	border-radius:8px;
	overflow:auto;
	:-webkit-scrollbar {
    width: 12px;
}
#stn
 {
	 width:200px;
	 height:30px;
	 border-radius:5px;
	 font-size:18px;
	 color:blue;
 }
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
 }
 
 input,textarea{
		display:block;
		width:100%;
		margin-top:12px;
		border:1px solid grey;
	}
	input{
		height:30px;
	}
	textarea{resize:none;height:100px;}
	.pbtn
	{
		display:block;
		height:40px;
		width:150px;
		border-radius:5px;
		border:none;
		background:green;
		color:white;
		margin-top:10px;
		font-size:18px;
		font-family:roboto;
	}
 
 
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
 <table id="imgtable">
 <?php
 //echo $_SESSION["id"];
 $sql="SELECT * FROM images ORDER BY `images`.`IMG_ID` DESC";
 $res=$con->query($sql);
 while($row=$res->fetch_assoc())
 {
	 $imgid=$row["IMG_ID"];
	 $uid=$row["U_ID"];
	 $sqll="SELECT NAME FROM users WHERE UID=$uid";
	 $ress=$con->query($sqll);
	 $r=$ress->fetch_assoc();
	 //$name=$r["NAME"];
	 echo "
	 <tr><td>{$r["NAME"]}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	
	 &nbsp<i>{$row["TIME"]}</i></td></tr>
	 <tr><td>{$row["IMGTEXT"]}</td></tr>
	 <tr><td><img src='{$row["IMAGE"]}' height='500' width='600' alt='upload Pending'></td></tr>
	 ";
	 echo "<tr><td><button id='like'><i class='fas fa-thumbs-up fa-3x' style='color:blue'></i> 
</button><button id='dislike'>
  <i class='fas fa-thumbs-down fa-3x' style='color:red'></i>
</button> <button id='comment'><i class='fas fa-comment fa-3x' style='color:yellow'></i> </button></td></tr>";
	 echo"<tr><td><input type='text' id='name' value='{$_SESSION["name"]}'>
	<textarea id='mess'></textarea>
	<button id='btn' class='pbtn'>Post Comments</button></td></tr>";
	echo "<tr><td><input type='hidden' id='img' value='$imgid'></td></tr>";
	echo "<tr><td><div id='box' style='color:green'>
		<ul>
		
		</ul>
	</div></td></tr>";
	 
 }
 
 
 ?>
 </table>
 </center>
</div>
 <script src="jquery-3.4.1.min.js"></script>
 <script>
 $(document).ready(function(){
	// alert("hai");
	$("#box").fadeOut();
	$("#comment").click(function(){
		//alert("hi");
	    $("#box").fadeToggle(1000);
			});
			
			
		$("#box ul").load("comments.php");
		$("#btn").click(function(){
		alert("hai");
		var imgid=$("#img").val();
		var name=$("#name").val();
		var mess=$("#mess").val();
		if(name=="" && mess=="")
		{
			alert("Please Fill all fields");
			return;
		}
		else
		{
		$.ajax({
		url:"save.php",
		type:"POST",
		data:{na:name,me:mess,imid:imgid},
		success:function(){

			$("<li></li>").html("<b>"+name+"</b>:"+mess).prependTo("#box ul");
			$("#name").val("");
			$("#mess").val("");
		}
		});
		}
		
		
		});

	
 });
 </script>
	</body>
</html>