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
function comp(){$("#answers").submit();}
$("#sub").click(function(){
$.post(".php",{qid:$("#qid").val(),ans:$("input:checked").val()},function(data){$("#content").html(data);});
});
});
</script>
<style>
#clock{width:95px;height:40px;margin:3px 0px 0px 3px;}
.right{float:right;padding-bottom: 5em; width: 20%;}
.left{
  float: left;
  width:80%;
  padding-bottom: 5em;
  height:400px;
  overflow: scroll;

}
.right table tbody tr{background-color: #4B2C0C;}
.qs{background-color: #D08437;}
#footer{margin-top: 20px;}
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
<div class="left">	
<?php
$count=1;
do
{
?>

(Q<?php echo $count;?>)&nbsp;<?php $id=$exam->loadQuestion(); ?>
<br>
<?php
 $allqids[]=$id;
 $answers=$exam->loadans();
 $allanswers[] = $answers;
 
 $i='a';
 foreach($answers as $answer)
 {
  
  echo $i.")&nbsp;".$answer['value'].'<br>';
  $i++;
 }
?>
<br/>
<?php 

$exam->nextQ();
$count++;


}while(!$exam->isEndOFExam());
 ?>
 (Q<?php echo $count;?>)&nbsp;<?php $id=$exam->loadQuestion(); ?>
<br>
<?php
 $allqids[]=$id;
 $answers=$exam->loadans();
 $allanswers[] = $answers;
 
 $i='a';
 foreach($answers as $answer)
 {
  
  echo $i.")&nbsp;".$answer['value'].'<br>';
  $i++;
 }
?>

</div>
 <div class="right">
    <form action="evaluate.php" method="post" id="answers">
    <table>
    	<thead>
        <td></td>
    		<td>A</td>
    		<td>B</td>
    		<td>C</td>
    		<td>D</td>
    	</thead>
        <?php
     for($i=0;$i<count($allanswers);$i++){
       
        
         ?>
    	<tr>
        <td class="qs"><?php echo $i+1;?></td>
            <?php
              
                foreach ($allanswers[$i] as $answer) {
            ?>
    		<td><input type="radio" name="<?php echo $allqids[$i];?>" value="<?php echo $answer['key']; ?>"></td>
            <?php
                }
            ?>
    	</tr>
    	<?php 
    }
    ?>
    </table>
    <input type="submit" value="go"> 
  </form>
 </div>
</div>
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
