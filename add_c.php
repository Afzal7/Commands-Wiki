<?php
/*$ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
echo $ipaddress;
*/	
	include 'sql.php';
	if(isset($_POST['nn'])&&isset($_POST['cc'])&&isset($_POST['ooss'])&&isset($_POST['dd']))
	{
		$name=mysqli_real_escape_string($con,strip_tags(trim($_POST['nn'])));
		$command=mysqli_real_escape_string($con,strip_tags(trim($_POST['cc'])));
		$os=mysqli_real_escape_string($con,strip_tags(trim($_POST['ooss'])));
		$description=mysqli_real_escape_string($con,strip_tags(trim($_POST['dd'])));
		if(isset($_POST['tt']))
		{
			$tool=mysqli_real_escape_string($con,strip_tags(trim($_POST['tt'])));
		}
		else
		{
			$tool='';
		}
		if(isset($_POST['ff']))
		{
			$fullform=mysqli_real_escape_string($con,strip_tags(trim($_POST['ff'])));
		}
		else
		{
			$fullform='';
		}
		if(isset($_POST['ee']))
		{
			$example=mysqli_real_escape_string($con,strip_tags(trim($_POST['ee'])));
		}
		else
		{
			$example='';
		}
		$query='create table if not exists newcommands(
        id INT primary key NOT NULL AUTO_INCREMENT,
        command VARCHAR(100) NOT NULL,
        name VARCHAR(40) NOT NULL,
        fullform VARCHAR(50),
        OS VARCHAR(20) NOT NULL,
        tool VARCHAR(50) NOT NULL DEFAULT "default",
        description VARCHAR(2000) NOT NULL,
        example VARCHAR(2000),
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
        )';
   		$create_table=mysqli_query($con,$query)or die('Error!!!!');
   		/*if($type=='command')
		{
			$ccc="select command from commands where id='".$id."'";
	//		$check1="select * from commands where id='".$id."' and description ='".$text."' ";
	//		$c1=mysqli_query($con,$check1) or die('Error in checking data!');
		}
		else if($type=='option')
		{
			$ccc="select opt from options where id='".$id."'";
	//		$check1="select * from options where id='".$id."' and description ='".$text."' ";
	//		$c1=mysqli_query($con,$check1) or die('Error in checking data!');
		}

   	//	if(mysqli_num_rows($c1)>0)
   	//	{
   	//		echo "You have not made any improvements !!! ";
   	//	}
   	//	else
   	//	{
	   	*/
	   	/*	$check2="select * from examples where command_id='".$id."' and command=(".$ccc.") and example ='".$text."' ";
	   	//	$c2=mysqli_query($con,$check2) or die('Error in checking data!!');
	   		
	   	//	if(mysqli_num_rows($c2)>0)
	   		{
	   			echo 'The same example has already been submitted before...';
	   		}
	   		else
	   		{
		  */ 		
	   			$insert="insert into newcommands(command,name,fullform,os,tool,description,example) VALUES('".$command."','".$name."','".$fullform."','".$os."','".$tool."','".$description."','".$example."')";
		   		$i=mysqli_query($con,$insert) or die(header('location:index.php?msg=An Unexpected error occured during the process :('));
		   		//echo 'Example Submitted :)'; 

		//	}
	//	}
   		mysqli_close($con);
		header('location:index.php?msg=Successfull Submission :)');
	}
	else
	{
		header('location:index.php');
	}
	
		

?>