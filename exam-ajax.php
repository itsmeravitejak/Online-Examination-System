<?php
include("include/exam.php");
global $session;
if(!$session->logged_in)
{
header("location: ./");
}
else if($_POST['action']=="end")
$exam->endexam();
else if($exam->isEndOfExam())
{
$exam->chkans($_POST['qid'],$_POST['ans']);
$exam->endexam();
echo "<script>window.location=\"results.php?result=latest&user=$session->username\"</script>";
}
else if(isset($_POST['ans']) && $_POST['qid'])
{
$exam->chkans($_POST['qid'],$_POST['ans']);
?>

(Q)<?php $id=$exam->loadQuestion(); ?><br>
<?php $answers=$exam->loadans();
foreach($answers as $answer)
echo '<input type="radio" name="ans" class="ans" value='.$answer['key'].'>'.$answer['value'].'<br>';
?>
<input type="hidden" name="qid" id="qid" value="<?php echo $id; ?>">
<?php
}

?>