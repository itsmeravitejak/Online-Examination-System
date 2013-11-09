<?php
include('session.php');
class exam
{
  function startExam($topic_id,$marks) //starts exam taking topic id as input
  {
    global $database;
   $_SESSION['isWritingExam']=true;
   $_SESSION['currentqkey']=0;
   $_SESSION['for']=$marks;
   $_SESSION['top_id']=$topic_id;
   $_SESSION['time']=time();
   $_SESSION['isEndOfExam']=false;
   $_SESSION['corcount']=0;
   if($database->isdreqs($topic_id,$marks))
   {
   $_SESSION['currentqarray']=$database->getranqarray($topic_id,$marks);
   return true;
   }
   else
   {return false;}
  } 
  function loadQuestion() //loads current question
  { 
  global $database;
  $res=$database->query('select q_text from questions where q_id='.$_SESSION['currentqarray'][$_SESSION['currentqkey']]);
  $row=mysql_fetch_array($res);
  echo $row[0];
  return $_SESSION['currentqarray'][$_SESSION['currentqkey']];
  }
  function nextQ()
  {
    $_SESSION['currentqkey']++;
    if($_SESSION['currentqarray'][$_SESSION['currentqkey']]==end($_SESSION['currentqarray']))
    $_SESSION['isEndOfExam']=true;
  }
  function loadans() //returns row[0] option1,row[1] option2....row[3] option4
  {
   global $database;
   $res=$database->query('select q_op1,q_op2,q_op3,q_op4 from questions where q_id='.$_SESSION['currentqarray'][$_SESSION['currentqkey']]);
   $row=mysql_fetch_array($res);
   for($i=0;$i<4;$i++)
   $ar[]=array('key'=>$i+1,'value'=>$row[$i]);
   shuffle($ar);
   return $ar;
  }
  function chkans($qid,$ansid) //checks the ans is correct or wrong
  {
   global $database;
    if($database->iscor($qid,$ansid)) 
    {
    $_SESSION['corcount']++; 
    return true;
    }
    else
      return false;
  }
  function endexam()
  {
    global $database;
    global $session;
    $_SESSION['isWritingExam']=false;
    $res=$database->query("INSERT INTO exam_res (`exam_id`, `result`, `for`, `timestamp`, `top_id`, `username`) VALUES (NULL, '".$_SESSION['corcount']."', '".$_SESSION['for']."', '".$_SESSION['time']."', '".$_SESSION['top_id']."', '".$session->username."')");
    unset($_SESSION['currentqarray']);    
    unset($_SESSION['corcount']);
    unset($_SESSION['currentqkey']);
    if(!$res)
    echo "error submiting";    
    
  }
  function isEndOfExam()
  {
   
  return $_SESSION['isEndOfExam'];
  }
}
$exam = new exam;
?>