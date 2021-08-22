<?php
	include("config.php");
	if(isset($_POST["name"]))
	{
		$name=$_POST["name"];
		if(strlen($name)>=6)
		{
			$sql="SELECT USER_NAME FROM users WHERE USER_NAME='$name'";
			$result=$con->query($sql);
			if($result->num_rows>0)
			{
				echo "<i style='color:red'> User Name Aleady Taken Try Another One<i>";
				
			}
			else
			{
			echo " <i style='color:red'>User Name Avaliable<i>";
					
			}
		}
		else
		{
			echo "Please Enter User Name which has More than 6 character";
		}
	}
	else
	{
		header("location:new_user.php?err=Please Register Here");
	}
?>