<?php
include("include/exam.php");
global $database;
global $session;
global $exam;
for ($i=0; $i < count($_SESSION['currentqarray']); $i++) { 
	$exam->chkans($_SESSION['currentqarray'][$i],$_POST[$_SESSION['currentqarray'][$i]])."\n";
}
$exam->endexam();
header("location: results.php?result=latest&user=".$session->username);

?>