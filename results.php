<?php
include("include/database.php");
?>
<html>
<head>
<title>Talent Hunt-results</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<style>
#data tr{background-color:#BC7E7E;color:#301A1A;}
#data td{font-size:19px;}
#data{width:500px;padding-left:3px;}
a img {border:none;}
</style>
</head>
<body>
<?php
global $database;

if(isset($_GET['id']))
{
 $examid=$_GET['id'];
  if(!$database->valid($examid))
  {
  echo "<font color=red><b>not a valid exam</b></font>";
  exit();
  }
 $result=$database->getresults($examid);
 echo "<table>";
 echo "<tr ><td colspan=2 align=\"center\"><b>Result</b></td></tr>";
 echo "<tr><td colspan=2 align=\"center\"><image src=\"imageloader.php?num=".$result['got']."&den=".$result['for']."\"></td></tr>";
 echo "<tr><td><b>Marks obtained</b></td><td>".$result['got']."</td></tr>";
 echo "<tr><td><b>Conducted marks</b></td><td>".$result['for']."</td></tr>";
 echo "<tr><td><b>Topic :</b></td><td>".$result['topic']."</td></tr>";
 echo "<tr><td><b>Date</b></td><td>".$result['date']."</td></tr>";
 echo "<tr><td><b>Time</b></td><td>".$result['time']."</td></tr>";
 echo "</table>";
 echo "<a href=\"?user=".$result['username'].'" title="Go back"><img src="images/back.png"></a>';
}
else if(isset($_GET['user']))
{
 if($_GET['result']=='latest')
 {
  $result=$database->getresults($database->latestExamID($_GET['user']));
  echo "<table>";
  echo "<tr ><td colspan=2 align=\"center\"><b>Result</b></td></tr>";
  echo "<tr><td colspan=2 align=\"center\"><image src=\"imageloader.php?num=".$result['got']."&den=".$result['for']."\"></td></tr>";
  echo "<tr><td><b>Marks obtained</b></td><td>".$result['got']."</td></tr>"; 
  echo "<tr><td><b>Conducted marks</b></td><td>".$result['for']."</td></tr>";
  echo "<tr><td><b>Topic :</b></td><td>".$result['topic']."</td></tr>";
  echo "<tr><td><b>Date</b></td><td>".$result['date']."</td></tr>";
  echo "<tr><td><b>Time</b></td><td>".$result['time']."</td></tr>";
  echo "</table>";
  echo "<a href=\"?user=".$result['username'].'" title="Go back"><img src="images/back.png"></a>';
 }
 else{
  $username=$_GET['user'];
   if($database->noresults(($username)))
   {
    echo "<b><font color=red size=6>".$username."</font></b> hasn't attended exams until now";
    exit();
   }
  $exams=$database->getExams($username);
  echo "<h1>Exams list(latest to oldest)</h1>";
  echo "<table cellpadding=5 cellspacing=0 id=data>"; 
  echo "<tr id=\"tag\"><td ><b>Topic</b></td><td><b>Date</b></td><td><b>Result</b></td></tr>";
  foreach($exams as $exam)
  echo "<tr><td>".$exam['topic']."</td><td>".$exam['date']."</td><td><a href=\"?id=".$exam['id']."\">view results</a></td></tr>";
  echo "</table>";
  echo "<a href=\"./\" title=\"Go back\"><img src=\"images/back.png\"></a>";
 }
}
?>

