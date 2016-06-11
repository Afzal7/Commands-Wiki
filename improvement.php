<?php
	include 'sql.php';
	if(isset($_POST['id'])&&isset($_POST['type']))
	{
		$id=mysqli_real_escape_string($con,strip_tags(trim($_POST['id'])));
		$type=mysqli_real_escape_string($con,strip_tags(trim($_POST['type'])));
	}
	else
	{
		header('location:index.php');
	}
	if($type=='command')
	{
		$desc="select description from commands where id='".$id."'";	
	}
	else if($type=='option')
	{
		$desc="select description from options where id='".$id."'";
	}
	$d=mysqli_query($con,$desc);
	$text=mysqli_fetch_array($d);
	echo "<span id='".$id."' class='improve_box'><br>
		Name:<br>
		<input type='text' id='".$id."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
		<span id='".$id."' class='close_improve_box'>X</span>
		<br>Edit : <br>
		<textarea id='".$id."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$text[0]."</textarea>
		<input type='button' id='".$id."' class='improve_submit' value='Submit'>
		<span id='".$id."' class='improve_response'></span>
		</span>";
?>
<style>
.improve{
	color:#FF9900;
	cursor:pointer;
}
.improve:hover{
	text-decoration:underline;
}
.improve:active{
	color:red;
}
.improve_box{
	font-size:12px;
}
.close_improve_box{
	float:right;
	font-size:15px;
	cursor:pointer; 
	font-weight:bold;
    font-family:Arial;
    color:white;
}
.close_improve_box:hover{ 
    color:red;
}
.improve_name{
	min-width:250px;
	width:60%;
	color:black;
}
.improve_textarea{
	min-width:250px;
	width:60%;
	min-height:100px;
	color:black;
}
.improve_submit,.oimprove_submit{
	color:black;
}
.improve_response{

}
</style>
<script src='jq.js'></script>
<script>
	$(document).ready(function(){
		/*$('.improve').click(function(){
			var id=$(this).attr('id');
			$('.improve_box').filter('#'+id).fadeIn();
		});*/
		$('.improve_submit,.oimprove_submit').click(function(){
			var id=$(this).attr('id');
			var name=$('.improve_name').filter('#'+id).val();
			var text=$('.improve_textarea').filter('#'+id).val();
			var coropt;
			if ($(this).attr('class')=='improve_submit')
			{coropt='command';}
			else if($(this).attr('class')=='oimprove_submit')
			{coropt='option';}
			$.post('improve.php',{id:id,name:name,text:text,type:coropt},function(response){
				if(response=='Improvement Submitted :)')
				{
					$('.improve_response').filter('#'+id).html('<br><br><span style="font-size:15px;">'+response+'</span>');
					$('.improve_box').filter('#'+id).delay(3500).fadeOut();
				}
				else
				{
					$('.improve_response').filter('#'+id).html('<br><br><span style="font-size:15px;">'+response+'</span>');
				}
			});
		});
		$('.close_improve_box').click(function(){
			var id=$(this).attr('id');
			$('.improve_box').filter('#'+id).fadeOut('fast');
			$('.improve_name').filter('#'+id).val('');
			$('.improve_response').filter('#'+id).html('');
		});

	});
</script>