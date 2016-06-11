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
	if(isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['text'])&&isset($_POST['type']))
	{
		$id=mysqli_real_escape_string($con,strip_tags(trim($_POST['id'])));
		$name=mysqli_real_escape_string($con,strip_tags(trim($_POST['name'])));
		$text=mysqli_real_escape_string($con,strip_tags(trim($_POST['text'])));
		$type=mysqli_real_escape_string($con,strip_tags(trim($_POST['type'])));
	}
	else
	{
		header('location:index.php');
	}
	
	if($id=='' || $name=='' || $text=='' || $type=='')
	{
		mysqli_close($con);
		echo 'Empty Inputs :(';
	}
	else
	{
		$query='create table if not exists examples(
        sno INT primary key NOT NULL AUTO_INCREMENT,
        command_id INT NOT NULL,
        command VARCHAR(100),
        name VARCHAR(40),
        ip BINARY(16),
        example VARCHAR(2000),
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
        )';
   		$create_table=mysqli_query($con,$query)or die('Error!!!!');
   		if($type=='command')
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
	   		$check2="select * from examples where command_id='".$id."' and command=(".$ccc.") and example ='".$text."' ";
	   		$c2=mysqli_query($con,$check2) or die('Error in checking data!!');
	   		
	   		if(mysqli_num_rows($c2)>0)
	   		{
	   			echo 'The same example has already been submitted before...';
	   		}
	   		else
	   		{
		   		$insert="insert into examples(command_id,command,name,example) VALUES('".$id."',(".$ccc."),'".$name."','".$text."')";
		   		$i=mysqli_query($con,$insert) or die('Error in Adding Example !!!');
		   		echo 'Example Submitted :)'; 
			}
	//	}
   		mysqli_close($con);
	}

?>