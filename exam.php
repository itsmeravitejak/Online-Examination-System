<?php
include("include/exam.php");
global $database;
global $session;
global $exam;
if(!$session->logged_in)
include("login.php");
else if(!isset($_POST['subjectid']) && !isset($_POST['topicid']))
include("disp.php");
else if(isset($_POST['subjectid']) && isset($_POST['topicid']))
{
$subid=$_POST['subjectid'];
$topicid=$_POST['topicid'];
$marks=$_POST['marks'];
$val=$exam->startExam($topicid,$marks);
if($val){
?>
<!--force IE into Quirks Mode-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Talent Hunt -exam</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/jquery.countdown.css">
<script src="js/jquery.js"></script>
<script src="js/jquery.countdown.js"></script>
<script>
$(function(){
$('#clock').countdown({until: '+<?php echo $_SESSION['for'];?>m',format:'MS',onExpiry:comp});
function comp(){$.post("exam-ajax.php",{action:"end"},function(data){window.location="results.php?user=<?php echo $session->username; ?>&result=latest"});}
$("#sub").click(function(){

$.post("exam-ajax.php",{qid:$("#qid").val(),ans:$("input:checked").val()},function(data){$("#content").html(data);});
});
});
</script>
<style>
#clock{width:95px;height:40px;margin:3px 0px 0px 3px;}
</style>
<meta http-equiv="content-type"
content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/footerframe.css" />
<!--[if IE]>
<style type="text/css">
body
{
overflow-y: hidden;
}
div#wrapper
{
height: 100%;
overflow: auto;
}
</style>
<![endif]-->
</head>
<body>
<div id="wrapper">
<div id="header">
<h1 class="logo">Talent Hunt</h1>
<span class="strapline">Topic: <?php echo $database->gettopicname($_SESSION['top_id']);?></span>
</div>
<div id="content">

(Q)<?php $id=$exam->loadQuestion(); ?><br>
<?php $answers=$exam->loadans();
foreach($answers as $answer)
echo '<input type="radio" name="ans" class="ans" value='.$answer['key'].'>'.$answer['value'].'<br>';
?>
<input type="hidden" name="qid" id="qid" value="<?php echo $id; ?>">
</div>
<input type="button" id="sub" value="next" >
</div>
<div id="footer">
<div id="clock"></div>
</div>
</body>
</html>
<?php
}
else
{ 
echo "there are not as many questions as you asked";
}
}
?>
