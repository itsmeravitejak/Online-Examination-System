<?php
include("include/database.php");
if(isset($_GET['user']))
{
if($database->usernameTaken($_GET['user'])||!eregi("^([0-9a-z])+$",$_GET['user']))
echo "false";
else 
echo "true";
}
?>