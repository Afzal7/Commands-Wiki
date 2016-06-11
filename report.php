<?php
	include 'sql.php';
	$query='create table if not exists reports(
        id INT primary key NOT NULL AUTO_INCREMENT,
        name VARCHAR(50),
        report VARCHAR(100),
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
        )';
    $create_table=mysqli_query($con,$query)or die('Error!!!!');
	$name=mysqli_real_escape_string($con,strip_tags(trim($_POST['name'])));
	$report=mysqli_real_escape_string($con,strip_tags(trim($_POST['report'])));

	if($name=='')
	{
	//	mysqli_close($con);
		echo 'Empty Inputs !!!';
	}
	else
	{
		$query="insert into reports(name,report) VALUES('".$name."','".$report."')";
		$q=mysqli_query($con,$query)or die('Error in Report process !!!');
		echo 'Report Submitted Successfully.';
	}
	//mysqli_close($con);
?>