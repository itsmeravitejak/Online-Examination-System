<?php
global $database;
?>
<html>
<head>
<title>Exam settings</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
$("#subject").change(loadtopics);
function loadtopics()
{
$.post("exammanger.php",{subject:$("#subject").val()},function(data){
$("#topic").html(data);
});
}
$.post("exammanger.php",{subject:$("#subject").val()},function(data){
$("#topic").html(data);
});
});
</script>
<style>
body{background-color:#D08437;}
tr{background-color:#4B2C0C;border-bottom:1px solid #000; }
table{border-collapse: collapse;}
td{font-size:20px;color:#fff;}
</style>
</head>
<body>
<form action="" method="post">
<table align="center" height="190px" width="500px" border="0">
<caption>Exam Settings</caption>
<tr ><td >Select the subject</td><td><select id="subject" name="subjectid"><?php $database->psubs($session->branchid); ?></select></td></tr>
<tr><td>Select the topic</td><td><select id="topic" name="topicid"></select></td></tr>
<tr><td>Select the no of marks u want to write</td><td><select name="marks"><option value=10>10</option><option value=30>30</option</select></td></tr>
<tr><td></td><td><input type="submit" value="go" id="sub"></td></tr>
</table>
</form>
</body>
</html>
