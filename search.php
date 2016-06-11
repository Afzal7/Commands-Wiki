<?php

	include 'sql.php';
	sleep(1);
	if(isset($_POST['input'])&&isset($_POST['type']))
	{
		$input1=mysqli_real_escape_string($con,strip_tags(trim($_POST['input'])));
		$type=mysqli_real_escape_string($con,strip_tags(trim($_POST['type'])));
	}
	else
	{
		header('location:index.php');
	}
	if($type=='command')
	{	
		$input2=explode(" ",$input1);
		$count=0;$tool;
		echo "<div id='' style='padding:2%;'>";
		foreach($input2 as $input)
		{	
			if(filter_var($input,FILTER_VALIDATE_IP))
			{
				echo ">> ".$input." : This is the Target's ip address.";
				echo '<hr>';
			}
			else if(preg_match("/\./",$input))
			{
				echo ">> ".$input." : This is a file or a Web address.";
				echo '<hr>';
			}
			else if(preg_match("/\//",$input))
			{
				echo ">> ".$input." : This is a file directory.";
				echo '<hr>';
			}
			else
			{
				$query='select * from commands where command="'.$input.'"';
				$q=mysqli_query($con,$query);
				
				
				if(mysqli_num_rows($q)>0)
				{
					
					while($result=mysqli_fetch_array($q))
					{						
						if($count==0)
						{
							$tool=$result[1];
							//echo 'tool:'.$tool;
							$count=1;
						}
						echo "<br><u>Command</u> >".$result[1];
						if($result[2]!='')
						{
							echo "(".$result[2].")";
						}
						if($tool!=strtolower($result[4]))
						{
							echo "<br><br><u>Operating System</u> : ".$result[3];
							if($result[4]!='default')
							{
								echo "<br><br><u>Tool</u> : ".$result[4];
							}
						}
						echo "<br><br> >>><span id='".$result[0]."' class='desc'>".$result[5].'</span>';
						if($result[6])
						{
							echo "<br><br><u>Example</u> : <br>".$result[6].'';
						}
						$arg_q='select * from options where command="'.$result[1].'"';
						$arg=mysqli_query($con,$arg_q) or die('Error in checking Arguments !!!');
						/////////////////////improve///////////////////////////////////////
						echo "<br><span style='float:right;'>";
						if(mysqli_num_rows($arg)>0)
						{	
							echo "<span id='".$result[0]."' class='show_arg'>Show Arguments</span>&nbsp&nbsp";
						}
						echo "<span id='".$result[0]."' class='improve'>Improve this data</span>&nbsp
						<span id='".$result[0]."' class='add'>Add an example</span></span>";
						echo "<div id='".$result[0]."' class='improve_box'><br>
						Name:
						<span id='".$result[0]."' class='close_improve_box'>X</span><br>
						<input type='text' id='".$result[0]."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
						
						<br>Edit : <br>
						<textarea id='".$result[0]."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$result[5]."</textarea>
						<input type='button' id='".$result[0]."' class='improve_submit' value='Submit'>
						<span id='".$result[0]."' class='improve_response'></span>
						</div>";
						/////////////////////////////////////////////////////////////////////
						
						echo '<br><hr><div id="'.$result[0].'" class="display_arg">';

								while($r=mysqli_fetch_array($arg))
								{
									echo "<u>Argument</u> >".$r[1];
									if($r[2]!='')
									{
										echo " (".$r[2].")";
									}
									echo "<br><br> >>><span id='".$r[0]."' class='desc'>".$r[5].'</span>';
									if($r[6])
									{
										echo "<br><br><u>Example</u> : <br>".$r[6];
									}
									/////////////////////improve///////////////////////////////////////
									echo "<br><span style='float:right;'><span id='".$r[0]."' class='improve'>Improve this data</span>&nbsp&nbsp";
									echo "<span id='".$r[0]."' class='add'>Add an example</span></span>";
									echo "<div id='".$r[0]."' class='improve_box'><br>
									Name:
									<span id='".$r[0]."' class='close_improve_box'>X</span><br>
									<input type='text' id='".$r[0]."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
									
									<br>Edit : <br>
									<textarea id='".$r[0]."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$r[5]."</textarea>
									<input type='button' id='".$r[0]."' class='oimprove_submit' value='Submit'>
									<span id='".$r[0]."' class='improve_response'></span>
									</div>";
									/////////////////////////////////////////////////////////////////////
									echo '<br><hr id="line">';
								}
						echo '</div>';
					}
					
					
				}
				else
				{
					if($count==0)
					{	
						$query='select * from options where opt="'.$input.'"';
					}
					else if($count==1)
					{
						$query='select * from options where opt="'.$input.'" and command="'.$tool.'"';	
					}
					$q=mysqli_query($con,$query);
					if(mysqli_num_rows($q)==0)
					{
						$query='select * from options where opt="'.$input.'" and command="ALL"';
						$q=mysqli_query($con,$query);
					}	
					if(mysqli_num_rows($q)>0)
					{
						while($result=mysqli_fetch_array($q))
						{
							echo "<br><u>Argument</u> >".$result[1];
							if($result[2]!='')
							{
								echo " (".$result[2].")";
							}
							if($count==0 && $result[4]!='ALL')
							{
								echo "&nbsp&nbsp&nbsp<u>Command</u> >".$result[4];
							}
							echo "<br><br><u>Operating System</u> : ".$result[3];
							echo "<br><br> >>><span id='".$result[0]."' class='desc'>".$result[5].'</span>';
							if($result[6])
							{
								echo "<br><br><u>Example</u> : <br>".$result[6];
							}
							/////////////////////improve///////////////////////////////////////
							echo "<br><span style='float:right;'><span id='".$result[0]."' class='improve'>Improve this data</span>&nbsp&nbsp";
							echo "<span id='".$result[0]."' class='add'>Add an example</span></span>";
							echo "<span id='".$result[0]."' class='improve_box'><br>
							Name:
							<span id='".$result[0]."' class='close_improve_box'>X</span><br>
							<input type='text' id='".$result[0]."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
							
							<br>Edit : <br>
							<textarea id='".$result[0]."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$result[5]."</textarea>
							<input type='button' id='".$result[0]."' class='oimprove_submit' value='Submit'>
							<span id='".$result[0]."' class='improve_response'></span>
							</span>";
							/////////////////////////////////////////////////////////////////////
							echo '<br><hr>';
						}
					}
					else
					{	
						echo '<center><span style="font-family:Comic Sans MS;color:red;text-shadow:0px 0px 2px black;">Command "'.$input.'" not found :( </span></center>';
						if(strlen($input)>1)
						{	
							echo '<br><center><span style="font-family:Consolas;color:white;text-shadow:0px 0px 2px black;">Execute [Advance search]<br><br>Executing...<br>Splitting characters....</span></center><hr>';
							$Arguments=str_split($input);
							foreach($Arguments as $a)
							{
								if($count==0)
								{	
									$query='select * from options where (opt="'.$a.'" or opt="-'.$a.'") ';
								}
								else if($count==1)
								{
									$query='select * from options where (opt="'.$a.'" or opt="-'.$a.'") and command="'.$tool.'"';	
								}
								$q=mysqli_query($con,$query);
								if(mysqli_num_rows($q)==0)
								{
									$query='select * from options where opt="'.$a.'" and command="ALL"';
									$q=mysqli_query($con,$query);
								}	
								if(mysqli_num_rows($q)>0)
								{
									while($result=mysqli_fetch_array($q))
									{
										echo "<u>Argument</u> >".$result[1];
										if($result[2]!='')
										{
											echo " (".$result[2].")";
										}
										if($count==0)
										{
											echo "&nbsp&nbsp&nbsp<u>Command</u> >".$result[4];
										}
										echo "<br><br> >>><span id='".$result[0]."' class='desc'>".$result[5].'</span>';
										if($result[6])
										{
											echo "<br><br><u>Example</u> : <br>".$result[6];
										}
										/////////////////////improve///////////////////////////////////////
										echo "<br><span style='float:right;'><span id='".$result[0]."' class='improve'>Improve this data</span>&nbsp&nbsp";
										echo "<span id='".$result[0]."' class='add'>Add an example</span></span>";
										echo "<span id='".$result[0]."' class='improve_box'><br>
										Name:
										<span id='".$result[0]."' class='close_improve_box'>X</span><br>
										<input type='text' id='".$result[0]."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
										
										<br>Edit : <br>
										<textarea id='".$result[0]."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$result[5]."</textarea>
										<input type='button' id='".$result[0]."' class='oimprove_submit' value='Submit'>
										<span id='".$result[0]."' class='improve_response'></span>
										</span>";
										/////////////////////////////////////////////////////////////////////
										echo '<br><hr id="line">';
									}
								}
								else
								{
									if($a!='-')
									{
									echo '<center><span style="font-family:Comic Sans MS;color:red;text-shadow:0px 0px 2px black;">Argument "'.$a.'" not found in the Database :( </span></center><hr id="line">';
									}
								}
							}
						}
					}
				}
			}	
		}
		echo "</div>";
	}
	if($type=='description')
	{	
		$replace='%';
		$find=array("%","linux","windows","nmap","how","what","where","why","in","the","of","is","to","are","and","an");

		$replaced_input1=str_ireplace($find,$replace,$input1);
		$n=explode(" ",$replaced_input1);

		$temp;$c=0;
		foreach($n as $x)
		{
			if(!in_array($x,$find))
			{	
				$temp[$c]=$x;
				$c++;
			}
		}
		if(!empty($temp))
		{
			$n=$temp;	
			$empty=1;
		}
		else
		{
			$empty=0;
		}
		$no_results=1;
		echo "<div id='' style='padding:2%;'>";
		if($empty)
		{
			$start=0;
			$count=0;
			$results_count=0;
			$l=sizeof($n)-1;
			for($i=$l;$i>=0;$i--)
		    {
		    	$end=$i;
		    	$start=0;
		    	while($end<=$l && $results_count<5)
		    	{    		
		    		$search='';
		    		for($j=$start;$j<=$end;$j++)
		    		{
		    			if($n[$j]!='%')
		    			{	
		    				$search=$search.'%'.$n[$j];
		    			}
		    		}
		    		$search=$search.'%';
		    		//print $search.'<br>';
		    		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		    		if(filter_var($search,FILTER_VALIDATE_IP))
					{
						echo ">> ".$input1." : This must be the Target's ip address.";
						echo '<hr>';
						$results_count=10;
						$no_results=0;
					}
					else if(preg_match("/\./",$search))
					{
						echo ">> ".$input1." : This must be a file or a Web address.";
						echo '<hr>';
						$results_count=10;
						$no_results=0;
					}
					else
					{
						$query='select * from commands where description like "'.$search.'"';
						$q=mysqli_query($con,$query);
						
						
						if(mysqli_num_rows($q)>0)
						{
							
							while($result=mysqli_fetch_array($q))
							{	
								if($results_count>5)
								{
									break;
								}
								else
								{
									$results_count++;				
								}	
								$no_results=0;
								echo "<br><u>Command</u> >".$result[1];
								if($result[2]!='')
								{
									echo "(".$result[2].")";
								}
								echo "<br><br><u>Operating System</u> : ".$result[3];
								if($result[4]!='default')
								{
									echo "<br><br><u>Tool</u> : ".$result[4];
								}
								echo "<br><br> >>><span id='".$result[0]."' class='desc'>".$result[5].'</span>';
								if($result[6])
								{
									echo "<br><br><u>Example</u> : <br>".$result[6].'';
								}
								$arg_q='select * from options where command="'.$result[1].'"';
								$arg=mysqli_query($con,$arg_q) or die('Error in checking Arguments !!!');
								/////////////////////improve///////////////////////////////////////
								echo "<br><span style='float:right;'>";
								if(mysqli_num_rows($arg)>0)
								{	
									echo "<span id='".$result[0]."' class='show_arg'>Show Arguments</span>&nbsp&nbsp";
								}
								echo "<span id='".$result[0]."' class='improve'>Improve this data</span>&nbsp
								<span id='".$result[0]."' class='add'>Add an example</span></span>";
								echo "<div id='".$result[0]."' class='improve_box'><br>
								Name:
								<span id='".$result[0]."' class='close_improve_box'>X</span><br>
								<input type='text' id='".$result[0]."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
								
								<br>Edit : <br>
								<textarea id='".$result[0]."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$result[5]."</textarea>
								<input type='button' id='".$result[0]."' class='improve_submit' value='Submit'>
								<span id='".$result[0]."' class='improve_response'></span>
								</div>";
								/////////////////////////////////////////////////////////////////////
								
								echo '<br><hr><div id="'.$result[0].'" class="display_arg">';

										while($r=mysqli_fetch_array($arg))
										{
											echo "<u>Argument</u> >".$r[1];
											if($r[2]!='')
											{
												echo " (".$r[2].")";
											}
											echo "<br><br> >>><span id='".$r[0]."' class='desc'>".$r[5].'</span>';
											if($r[6])
											{
												echo "<br><br><u>Example</u> : <br>".$r[6];
											}
											/////////////////////improve///////////////////////////////////////
											echo "<br><span style='float:right;'><span id='".$r[0]."' class='improve'>Improve this data</span>&nbsp&nbsp";
											echo "<span id='".$r[0]."' class='add'>Add an example</span></span>";
											echo "<div id='".$r[0]."' class='improve_box'><br>
											Name:
											<span id='".$r[0]."' class='close_improve_box'>X</span><br>
											<input type='text' id='".$r[0]."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
											
											<br>Edit : <br>
											<textarea id='".$r[0]."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$r[5]."</textarea>
											<input type='button' id='".$r[0]."' class='oimprove_submit' value='Submit'>
											<span id='".$r[0]."' class='improve_response'></span>
											</div>";
											/////////////////////////////////////////////////////////////////////
											echo '<br><hr id="line">';
										}
								echo '</div>';
							}
							
							
						}
						else
						{
							$query='select * from options where description like "'.$search.'"';
							
							$q=mysqli_query($con,$query);
				
							if(mysqli_num_rows($q)>0)
							{
								while($result=mysqli_fetch_array($q))
								{
									if($results_count>5)
									{
										break;
									}
									else
									{
										$results_count++;				
									}	
									$no_results=0;
									echo "<u>Argument</u> >".$result[1];
									if($result[2]!='')
									{
										echo " (".$result[2].")";
									}
									echo "&nbsp&nbsp&nbsp<u>Command</u> >".$result[4];
									
									echo "<br><br> >>><span id='".$result[0]."' class='desc'>".$result[5].'</span>';
									if($result[6])
									{
										echo "<br><br><u>Example</u> : <br>".$result[6];
									}
									/////////////////////improve///////////////////////////////////////
									echo "<br><span style='float:right;'><span id='".$result[0]."' class='improve'>Improve this data</span>&nbsp&nbsp";
									echo "<span id='".$result[0]."' class='add'>Add an example</span></span>";
									echo "<span id='".$result[0]."' class='improve_box'><br>
									Name:
									<span id='".$result[0]."' class='close_improve_box'>X</span><br>
									<input type='text' id='".$result[0]."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
									
									<br>Edit : <br>
									<textarea id='".$result[0]."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$result[5]."</textarea>
									<input type='button' id='".$result[0]."' class='oimprove_submit' value='Submit'>
									<span id='".$result[0]."' class='improve_response'></span>
									</span>";
									/////////////////////////////////////////////////////////////////////
									echo '<br><hr>';
								}
							}
							else
							{	
								
							}
						}
					}	
		    		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		    		$start++;
		    		$end++;
		    	}
		    	$count++;
		    }
		}
		else
		{
			echo '<center><span style="font-family:Comic Sans MS;color:red;text-shadow:0px 0px 2px black;"> "'.$input1.'" Not enough info. :( </span></center>';
		}
		if($no_results)
		{
			echo '<center><span style="font-family:Comic Sans MS;color:red;text-shadow:0px 0px 2px black;">No results found for "'.$input1.'" :( </span>';
		}
		echo '</div>';
	}
	else if($type=='tool')
	{
		$query='select * from commands where tool like "%'.$input1.'%" and tool!="default"';
		$q=mysqli_query($con,$query);
		
		echo "<div id='' style='padding:2%;'>";
		if(mysqli_num_rows($q)>0)
		{
			$tool_command=mysqli_fetch_array($q);
				
			echo "<u>Tool</u> : ".$tool_command[4];	
			echo "<br><br><u>Operating System</u> : ".$tool_command[3];
			echo "<br><br><u>Base Command</u> : ".$tool_command[1];
			echo "<br><br><u>Arguments :</u><br>";
			
			$query='select * from options where command="'.$tool_command[1].'"';
			$o=mysqli_query($con,$query);
			
			while($result=mysqli_fetch_array($o))
			{
				echo ">>>".$result[1];
				if($result[2]!='')
				{
					echo "(".$result[2].")";
				}
				
				echo "<br>&nbsp&nbsp<span id='".$result[0]."' class='desc'>".$result[5]."</span>";
				if($result[6])
				{
					echo "<br><br><span style='font-size:15px;'><u>Example</u> : <br>".$result[6].'</span>';
				}
				/////////////////////improve///////////////////////////////////////
				echo "<br><span style='float:right;'>";
				
						echo "<span id='".$result[0]."' class='improve'>Improve this data</span>&nbsp
						<span id='".$result[0]."' class='add'>Add an example</span></span>";
						echo "<div id='".$result[0]."' class='improve_box'><br>
						Name:
						<span id='".$result[0]."' class='close_improve_box'>X</span><br>
						<input type='text' id='".$result[0]."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
						
						<br>Edit : <br>
						<textarea id='".$result[0]."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$result[5]."</textarea>
						<input type='button' id='".$result[0]."' class='oimprove_submit' value='Submit'>
						<span id='".$result[0]."' class='improve_response'></span>
						</div>";
				/////////////////////////////////////////////////////////////////////
				echo '<br><hr id="line">';			
			}
		}
		else
		{
			echo '<center><span style="font-family:Comic Sans MS;color:red;text-shadow:0px 0px 2px black;">Tool " '.$input1.' " not found :(</span></center><hr>';
		}
			echo "</div>";
		
	}
	else if($type=='os')
	{
			$count=0;
			$query='select * from commands where OS like "%'.$input1.'%" and tool="default"';
			$q=mysqli_query($con,$query);
			echo "<div id='' style='padding:2%;'>";
			if(mysqli_num_rows($q)>0)
			{
				while($result=mysqli_fetch_array($q))
				{
					if($count==0)
					{
						echo "<br><u>Operating System</u> : ".$result[3].'<br><br>';
						$count++;
					}
					echo "# ".$result[1];
					if($result[2]!='')
					{
						echo "(".$result[2].")";
					}
					echo "<br><span id='".$result[0]."' class='desc' style='font-size:15px;'>".$result[5]."</span>";
					if($result[6])
					{
						echo "<br><br><span style='font-size:15px;'><u>Example</u> : <br>".$result[6].'</span>';
					}	
					/////////////////////////////////////improve///////////////////////////////////////
					echo "<br><span style='float:right;'>";
					echo "<span id='".$result[0]."' class='improve'>Improve this data</span>&nbsp
					<span id='".$result[0]."' class='add'>Add an example</span></span>";
					echo "<div id='".$result[0]."' class='improve_box'><br>
					Name:
					<span id='".$result[0]."' class='close_improve_box'>X</span><br>
					<input type='text' id='".$result[0]."' class='improve_name' placeholder='Your Name or Email...' autocomplete='off'/>
					<br>Edit : <br>
					<textarea id='".$result[0]."' class='improve_textarea' placeholder='Enter the Improved description...(limit 1000)' autocomplete='off'>".$result[5]."</textarea>
					<input type='button' id='".$result[0]."' class='improve_submit' value='Submit'>
					<span id='".$result[0]."' class='improve_response'></span>
					</div>";
					//////////////////////////////////////////////////////////////////////////////////
					echo '<br><hr id="line">';
				}				
			}
			else
			{
				echo '<br><center><span style="font-family:Comic Sans MS;color:red;text-shadow:0px 0px 2px black;">Unknown OS " '.$input1.' " :( <br>Try the Tool option!!!</span></center><hr>';
			}
			echo "</div>";
		
	}
	
	mysqli_close($con);
?>
<style>
.improve,.add,.show_arg{	
	color:#FF9900;
	cursor:pointer;
	font-size:15px;
}
.improve:hover,.add:hover,.show_arg:hover{
	text-decoration:underline;
}
.improve:active,.add:active,.show_arg:active{
	color:red;
}
.improve_box{
	display:none;
	font-size:13px;
	margin-top:2%;
	margin-left:1%;
	width:95%;
}
.display_arg{
	display:none;
	font-size:14px;
	margin-top:2%;
	margin-left:2%;
	width:95%;
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
	width:40%;
	color:black;
	padding:5px;
	border:0px;
}
.improve_textarea{
	min-width:250px;
	width:60%;
	min-height:100px;
	color:black;
	padding:5px;
	border:0px;
}
.improve_name:focus,.improve_textarea:focus{
	box-shadow:0px 0px 10px white;	
}
.improve_submit,.oimprove_submit{
	color:black;
	//border:0;
	//background:rgba(0,0,0,0.2);
	//padding:5px;
}
.improve_submit:hover,.oimprove_submit:hover{
}
.improve_response{

}
#line{
	border:0;
	height:1px;
	background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), white, rgba(0,0,0,0)); 
	background-image: -moz-linear-gradient(left, rgba(0,0,0,0),white, rgba(0,0,0,0)); 
	background-image: -ms-linear-gradient(left, rgba(0,0,0,0), white, rgba(0,0,0,0)); 
	background-image: -o-linear-gradient(left, rgba(0,0,0,0),white, rgba(0,0,0,0));
}
</style>
<script>
	$(document).ready(function(){
		var temp;
		$('.show_arg').click(function(){
			var id=$(this).attr('id');
			//$('.display_arg').filter('#'+id).toggle();
			if($('.display_arg').filter('#'+id).toggle().is(':visible'))
			{
				$('.show_arg').filter('#'+id).text('Hide Arguments');
			}
			else
			{
				$('.show_arg').filter('#'+id).text('Show Arguments');	
			}
		});
		$('.improve').click(function(){
			var id=$(this).attr('id');
			$('.improve_box').filter('#'+id).fadeIn();
			if($('.improve_textarea').filter('#'+id).val()=='')
			{
				var desc=$('.desc').filter('#'+id).text();
				$('.improve_textarea').filter('#'+id).val(desc);
			}
			temp='improve.php';
		});
		$('.add').click(function(){
			var id=$(this).attr('id');
			$('.improve_box').filter('#'+id).fadeIn();
			$('.improve_response').filter('#'+id).html('');
			$('.improve_textarea').filter('#'+id).val('');
			$('.improve_textarea').filter('#'+id).attr('placeholder','Write the example...');
			temp='add_example.php';
		});
		$('.improve_submit,.oimprove_submit').click(function(){
			var id=$(this).attr('id');
			var name=$('.improve_name').filter('#'+id).val();
			var text=$('.improve_textarea').filter('#'+id).val();
			var coropt;
			if ($(this).attr('class')=='improve_submit')
			{coropt='command';}
			else if($(this).attr('class')=='oimprove_submit')
			{coropt='option';}
			$.post(temp,{id:id,name:name,text:text,type:coropt},function(response){
				if(response=='Improvement Submitted :)' || response=='Example Submitted :)' )
				{
					$('.improve_response').filter('#'+id).html('<br><br><span style="font-size:15px;">'+response+'</span>');
					$('.improve_box').filter('#'+id).delay(3000).fadeOut();
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