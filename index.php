<!DOCTYPE html>
<html>
<head>
    <title>Commands Wiki</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="shortcut icon" href="cmd.png">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<style>
body{
    margin:0;
    background:url(cc2.png);
    background-size:20%;  
    background-repeat:no-repeat; 
}
#container{
    background-color:;
    position:relative;
    width:100%;
    height:auto;
    margin-top:4%;
    text-align:center;
}
#add{
    //background-color:#e4e4e4;
    background:rgba(0,150,136,0.9);color:white;
    text-align:left;
    position:absolute;
    z-index:2;
    margin:auto;
    top:0;
    right:0;
    left:0;
    width:40%;
    min-width:300px;
    height:auto;
    padding-top:0;
    padding-left:3%;
    padding-right:4%;
    border-radius:5px;
    box-shadow:0px 0px 10px grey;
    font-family:Consolas,Constantia,Arial;
    display:none;
    font-weight:bold; 
    text-shadow:0px 0px 4px grey;
}
#add:hover{
   // box-shadow:0px 2px 15px grey;
   // transition: all 800ms ease;
}
.newentry_objects{
    width:98%;
    border: solid 1px #c9c9c9;
    //box-shadow: inset 0 0 0 1px #707070;
    //box-shadow: inset 0 0px 2px red;
    padding:5px;
    color:black;
}
.newentry_objects:focus{
    border-color:cyan;
    box-shadow: 0 0px 10px black;
}

#name{
    font-family:Constantia;
    font-size:70px;
    text-shadow:0px 0px 5px grey;
    color:black;
}
#x{
    font-family:Consolas;
    font-size:70px;
    text-shadow:0px 0px 5px grey;
    color:black;
}
#tagline{
    font-family:Consolas,Constantia,Arial;
}
@media(max-width:400px)
{
    #container{
        margin-top:5%;
    }
    #name{
        font-size:40px;
    }
    #x{
        font-size:20px;
    }
    #type_form,#search_result,#submit{
        font-size:15px;
    }
    body{
        background:url();
    }
    .top_objects{
        word-spacing:-3px;
    }
}
#search_result{
    background-color:#660066;
    position:relative;
    margin-top:2%;
    margin-left:10%;
    margin-right:10%;
    width:auto;
    min-width:250px; 
    height:auto;
    color:white;
    font-family:Consolas;
    box-shadow:0px 0px 10px grey;
    font-size:120%;
}
#type_form{
    background-color:#660066;
    padding:8px;
    color:white;
    min-width:250px; 
    width:30%;
    border-radius:8px;
    box-shadow:0px 0px 5px grey;
    font-family:Consolas;
    text-align:center;
    margin:1%;
}
label{
    cursor:pointer;
}
#code_search{
    width:75%;
    height:30px;
    font-size:100%;
    font-family:Consolas;
    box-shadow:0px 1px 5px purple;
    padding-left: 10px;
    //border-style:solid;
    //border-color:purple;
    //border-width:1px; 
}
#submit{
    background-color:#660066;
    width:auto;
    height:auto;
    padding:.5%;
    display:inline;
    cursor:pointer;
    position:;
    border-radius:5px; 
    font-family:Arial;
    color:white;
    box-shadow:0px 1px 5px purple;
}
#submit:hover{
    border:solid 1px brown;
}
#submit:active{
    box-shadow:0px 0px 0px ;   
}
#top{ 
    width:100%;
    height:auto;
    margin:auto;
    top:0;
    //right:0;
    padding:.2%;
    position:absolute;
    font-family:Consolas,Arial;
    //background-color:#e4e4e4;
    //border: 1px solid white;
    //box-shadow:0px 0px 10px #CCCCFF;
}
#top:hover{

}
.top_objects{
    display:inline;
    cursor:pointer;
    color:#003380;
    padding:.3%;
    font-weight:bold;
    word-spacing:-6px; 
    float:right;
    border: 2px solid white;
    border-radius:5px; 
    transition: all 500ms ease;
}
.top_objects:hover{
    transition: all 800ms ease;
    color:black;
    border: 2px solid blue;
}
.top_objects:active{
    border-color:cyan;
}
#footer{ 
    width:100%;
    height:auto;
    margin:auto;
    bottom:0;
    padding:.5%;
    position:fixed;
    font-family:Consolas,Arial;
    background-color:#e4e4e4;
    border: 1px solid #CCCCFF;
}
#footer:hover{
//    border: 1px solid brown;
 //   transition: all 800ms ease;
}
.footer_objects{
    display:inline;
    cursor:pointer;
    color:;
    //font-weight:bold;
}
.footer_objects:hover{
    //text-decoration:underline;
    color:#003380;
    transition: all 800ms ease;
}
#about_p{
    display:none;
    padding:0;
    font-family:Consolas,Arial;
}
#feedback_p{
    display:none;
    margin:1%;
    font-family:Constantia,Consolas,Arial;
}
#feedback_input{
    
}
#report_p{
    display:none;
    margin:1%;
    font-family:Constantia,Consolas,Arial;
}
#close{
    display:none;
    float:right;
    cursor:pointer;
    font-weight:bold;
    font-family:Arial;
}
#close:hover,#close_form:hover{ 
    color:red;
}
#close_form{
    position:absolute;  
    margin:auto;
    right:0;
    padding-top:1%;
    padding-right:2%;
    cursor:pointer;
    font-weight:bold;
    font-family:Arial; 
    
}
::-webkit-scrollbar {
    width: 10px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
    background:#ccc;
}
</style>
<?php
    include 'sql.php';
    $query='create table if not exists commands(
        id INT primary key NOT NULL AUTO_INCREMENT,
        command VARCHAR(100),
        fullform VARCHAR(50),
        OS VARCHAR(20),
        tool VARCHAR(50) DEFAULT "default",
        description VARCHAR(2000),
        example VARCHAR(2000),
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
        )';
    $create_table=mysqli_query($con,$query)or die('Error!');
    $query='create table if not exists options(
        id INT primary key NOT NULL AUTO_INCREMENT,
        opt VARCHAR(50),
        fullform VARCHAR(50),
        OS VARCHAR(20),
        command VARCHAR(50) NOT NULL,
        description VARCHAR(2000),
        example VARCHAR(2000),
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
        )';
    $create_table=mysqli_query($con,$query)or die('Error!!');
    if(isset($_REQUEST['command']))
    {
        $command=mysqli_real_escape_string($con,strip_tags(trim($_REQUEST['command'])));
        $commands='';
        $how='';
        $msg='';
    }
    else if(isset($_REQUEST['commands']))
    {
        $commands=mysqli_real_escape_string($con,strip_tags(trim($_REQUEST['commands'])));
        $command='';
        $how='';
        $msg='';
    }
    else if(isset($_REQUEST['how']))
    {
        $how=mysqli_real_escape_string($con,strip_tags(trim($_REQUEST['how'])));
        $command='';
        $commands='';
        $msg='';
    }
    else if(isset($_REQUEST['msg']))
    {
        $msg=mysqli_real_escape_string($con,strip_tags(trim($_REQUEST['msg'])));
        $command='';
        $commands='';
        $how='';
    }   
    else
    {
        $command='';
        $commands='';
        $how='';
        $msg='';
    }
    mysqli_close($con);
?>

<script src='jq.js'></script>
<script>
    $(document).ready(function(){

        var msg='<?php echo $msg;?>';
        if(msg!='')
        {
            $('#msg_container').text(msg);
            $('#msg_container').show().delay(3000).fadeOut(2000);
            window.history.pushState("", "", "index.php");
        }
        $('#code_search').focus();
        var w=$(window).width();
        var n;
        if(w>450)
        {    
        setInterval(function(){
            n=$('#x').text();

            if(n!='_')
            {
                $('#x').text('_');
            }
            else
            {
                $('#x').html('&nbsp');
            }
        },700);
        }
        var type,add;
        function search(){
            
            var input=$('#code_search').val();
            if($('#code_search').val()=='')
            {
                $('#loader').hide();
                $('#search_result').text('');
                window.history.pushState("", "", "index.php");
            }
            else
            {
                $('#loader').show();
                if($('#command').is(':checked'))
                {
                    type='command';
                    add='command';
                }
                else if($('#description').is(':checked'))
                {
                    type='description';
                    add='how';
                }
                else if($('#tool').is(':checked'))
                {
                    type='tool';
                    add='commands';
                }
                else if($('#os').is(':checked'))
                {
                    type='os';
                    add='commands';
                }
                window.history.pushState("", "", "index.php?"+add+"="+input);
                $.post('search.php',{input:input,type:type},function(response){
                    $('#search_result').html(response);
                    $('#loader').hide();
                });
            }
            
        }
        var command='<?php echo $command;?>';
        var commands='<?php echo $commands;?>';
        var how='<?php echo $how;?>';
        if(command!=''&&commands==''&&how=='')
        {
            $('#code_search').attr('value',command);
            $('#command').attr('checked','checked');
            search();
        }
        else if(commands!=''&&commands!='linux'&&commands!='windows')
        {
            $('#code_search').attr('value',commands);
            $('#tool').attr('checked','checked');
            search();
        }
        else if(commands=='linux'&&commands!='windows')
        {
            $('#code_search').attr('value',commands);
            $('#os').attr('checked','checked');
            search();
        }
        else if(commands=='windows'&&commands!='linux')
        {
            $('#code_search').attr('value',commands);
            $('#os').attr('checked','checked');
            search();
        }
        else if(how!=''&&commands==''&&command=='')
        {
            $('#code_search').attr('value',how);
            $('#description').attr('checked','checked');
            search();
        }
        $('#submit').click(function(){
            search();
        });
        $('#code_search').keydown(function(e){
            if(e.keyCode=='13')
            {
                search();
            }
        });
        $('#command,#description,#tool,#os').click(function(){
            search();
        });
        $('#name').click(function(){
            document.location='http://computercode.wc.lt';
        });
        $('#about').click(function(){
            if($('#feedback_p').is(':visible'))
            {
                $('#feedback_p').slideUp();    
            }
            if($('#report_p').is(':visible'))
            {
                $('#report_p').slideUp();    
            }
            $('#about_p').slideDown();
            $('#close').show();          
        });
        $('#feedback').click(function(){
            $('#response').html('');
            if($('#about_p').is(':visible'))
            {
                $('#about_p').slideUp();    
            }
            if($('#report_p').is(':visible'))
            {
                $('#report_p').slideUp();    
            }
            $('#feedback_p').slideDown();
             $('#close').show();
        });
        $('#report').click(function(){
            $('#response_report').html('');
            if($('#about_p').is(':visible'))
            {
                $('#about_p').slideUp();    
            }
            if($('#feedback_p').is(':visible'))
            {
                $('#feedback_p').slideUp();    
            }
            $('#report_p').slideDown();
             $('#close').show();
        });
        $('#close').click(function(){
            $('#about_p,#feedback_p,#report_p').slideUp();
            $('#close').hide();
        });
        $('#feedback_submit').click(function(){
            var name=$('#reviewer').val();
            var feedback=$('#review').val();
            $.post('feedback.php',{name:name,feedback:feedback},function(response){
                if(response=='Empty Inputs !!!') 
                {
                    $('#response').html('<span style="color:red;"><br><br>'+response+'</span>');  
                } 
                else
                {
                    $('#response').html('<span style="color:green;"><br><br>'+response+'</span>');  
                    $('#reviewer').val('');
                    $('#review').val('');
                    //$('#feedback_p').delay(2000).slideUp();
                    //$('#close').delay(2100).hide(0);
                }
            });
           
        });
        $('#report_submit').click(function(){
            var name=$('#reporter').val();
            var report=$('#reporting').val();
            $.post('report.php',{name:name,report:report},function(response){
                if(response=='Empty Inputs !!!') 
                {
                    $('#response_report').html('<span style="color:red;"><br><br>'+response+'</span>');  
                } 
                else
                {
                    $('#response_report').html('<span style="color:green;"><br><br>'+response+'</span>');  
                    $('#reporter').val('');
                    $('#reporting').val('');
                    //$('#feedback_p').delay(2000).slideUp();
                    //$('#close').delay(2100).hide(0);
                }
            });
           
        });
        $('#add_c').click(function(){
            $('#add').fadeIn();
            $('#cc_text').text('Command');
            $('#tt_text').text('Tool');
            $('#tt').removeAttr('required');
        });
        $('#add_a').click(function(){
            $('#add').fadeIn();
            $('#cc_text').text('Argument');
            $('#tt_text').text('Command *');
            $('#tt').attr('required','required');
        });
        $('#dd').keyup(function(){
            var text=$('#dd').val();
            $('#desc_length').text(2000-text.length+'/2000');
            if(text.length>2000)
            {
                $("#dd").val(text.substring(0, (2000)));
                $('#dd').text('0/2000');
            }
        });
        $('#close_form').click(function(){
           $('#add').fadeOut(); 
        });
    });
</script>

<body>
<!--Kristen ITC
Matura MT Script Capitals
Viner Hand ITC
Constantia-->
<div id='msg_container' style='background-color:#FF5050;width:300px;margin:auto;top:3%;left:0;right:0;position:fixed;z-index:3;color:white;font-family:Arial;border-radius:5px;padding:1%;text-align:center;font-weight:bold;display:none;'>
</div>
<div id='top'>
    <span id='add_a' class='top_objects'>Add Argument</span>
    <span id='add_c' class='top_objects'>Add Command</span>
</div>
<div id='container'>
<div id='add'>
    <span id='close_form'>X</span>
    <br><h4>Did we miss something ? Let us know !</h4>
    
    <form method="post" id='newentry_form' action="add_c.php">
    Your Name * <br>
    <input type="text" name="nn" id="nn" placeholder='Name or Email' class='newentry_objects' value="" autocomplete="off" required>

    <br><br><span style='width:49%;display:inline-block;'><span id='cc_text'>Command</span> *<br>
    <input type="text" name="cc" id="cc" class='newentry_objects' style='width:100%;' placeholder='~#' value="" autocomplete="off" required>
    </span>

    <span style='width:49%;display:inline-block;'>Operating System *<br>
    <select id='ooss' name='ooss' class='newentry_objects' style='width:100%;' required>
        <option value='Linux' selected>Linux</option>
        <option value='Windows'>Windows</option>
        <option value='lw'>Linux/Windows</option>
    </select></span>

    <br><br><span style='width:49%;display:inline-block;'>Fullform/Alias <br>
    <input type="text" name="ff" id="ff" class='newentry_objects' style='width:100%;' placeholder='' value="" autocomplete="off">
    </span>
    <span style='width:49%;display:inline-block;'><span id='tt_text'>Tool</span><br>
    <input type="text" name="tt" id="tt" class='newentry_objects' style='width:100%;' autocomplete="off">
    </span>
    <br><br>Description *<br>
    <textarea id="dd" name='dd' class='newentry_objects' placeholder='Explain the command or Just Type -NIL-' autocomplete="off" required></textarea> 
    <p id='desc_length' style='color:darkgreen;'>2000/2000</p>
    
    Example<br>
    <textarea id="ee" name='ee' class='newentry_objects' placeholder='Any Examples ?' autocomplete="off"></textarea> 
    
    <br><input type="submit" value="Submit" id="ss" class="btn btn-primary" name="ss">
    </form>
    <br>
</div>
<span id='name' style='cursor:pointer;'>Commands Wiki</span>
<span id='x' style=''>_</span>
<br><span id='tagline'>The online platform to learn shell Commands (Linux and Windows)</span><br><br>
<input id='code_search' style='' autocomplete='off' placeholder='>_ Enter command'>
<div id='submit'>Search</div>

<center>
<form id='type_form'>
<input id='command' type='radio' name='result_type' checked><label for='command'>Command</label>
<input id='tool' type='radio' name='result_type' style=''><label for='tool'>Tool</label>
<input id='os' type='radio' name='result_type' style=''><label for='os'>OS</label>
<input id='description' type='radio' name='result_type' style=''><label for='description'>Miscellaneous<sup>beta</sup></label>
</form>
</center>

<center><img src="hex2.gif" id='loader' alt='Calculating Response...' style="width:13%;min-width:80px;display:none;"></center>
</div>
<div id='search_result'></div>
<br><br>
<div id='footer'>
    <span id='about' class='footer_objects'>About</span>
    <span id='feedback' class='footer_objects'>Feedback</span>
    <span id='report' class='footer_objects'>Report</span>
    <span id='close'>&nbspX&nbsp</span>
    <p id='about_p'>
    <strong>Commands Wiki</strong> is a Command Search Engine. It is an online platform to learn shell commands. Explore and learn all the commands of your Operating System.Commands Wiki is the best place for learning and improving the online learning experience of the future.Commands Wiki also let you explore commands of some of the most popular Security Tools like <strong>Nmap and Metasploit</strong>(Coming Soon).
    
    <br>&nbsp&nbsp&nbsp>_Select the <strong>Command</strong> option to search a command.
    <br>&nbsp&nbsp&nbsp>_Select the <strong>Miscellaneous</strong> option to search a command with a specific description.
    <br>&nbsp&nbsp&nbsp>_Select the <strong>Tool</strong> option to explore the commands of a Tool.
    <br>&nbsp&nbsp&nbsp>_Select the <strong>OS</strong> option to explore the commands of an Operating system.
 
    </p>
    <p id='feedback_p'>
        Name <br><input type='text' id='reviewer' class='feedback_input' style='padding:3px;' placeholder='Name or Email' autocomplete='off'/>
        <br><br>Feedback <br><textarea id='review' class='feedback_input' placeholder='Any Comment or Suggestions !' style='width:300px;height:100px;padding:3px;' autocomplete='off'></textarea>
        <input type='button' value='Submit' id='feedback_submit' class='btn btn-primary' >
        <span id='response'></span>
    </p>
    <p id='report_p'>
        Name <br><input type='text' id='reporter' class='feedback_input' style='padding:3px;' placeholder='Name or Email' autocomplete='off'/>
        <br><br>Report <br><textarea id='reporting' class='feedback_input' placeholder='Any Bug or Error !' style='width:300px;height:100px;padding:3px;' autocomplete='off'></textarea>
        <input type='button' value='Submit' id='report_submit' class="btn btn-primary">
        <span id='response_report'></span>
    </p>
</div>
</body>
</html>