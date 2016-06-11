<?php
	include 'sql.php';
	$query='create table if not exists feedback(
        id INT primary key NOT NULL AUTO_INCREMENT,
        name VARCHAR(50),
        feedback VARCHAR(100),
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
        )';
    $create_table=mysqli_query($con,$query)or die('Error!!!');
	$name=mysqli_real_escape_string($con,strip_tags(trim($_POST['name'])));
	$feedback=mysqli_real_escape_string($con,strip_tags(trim($_POST['feedback'])));

	if($name=='' || $feedback=='')
	{
	//	mysqli_close($con);
		echo 'Empty Inputs !!!';
	}
	else
	{
		$query="insert into feedback(name,feedback) VALUES('".$name."','".$feedback."')";
		$q=mysqli_query($con,$query)or die('Error in Feedback process !!!');
		echo 'Feedback Submitted Successfully.';
	}
	//mysqli_close($con);
?>