<?php
include("include/session.php");

/**
 * User has already logged in, so display relavent links, including
 * a link to the admin center if the user is an administrator.
 */
if($session->logged_in){
?>
<html>
<title>Logged in</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<style>
 
#exam{
height:64px;
width:64px;
background: url(images/exam.png) no-repeat 0px 0px;
padding-top:15px;
padding-left:64px;
padding-bottom:35px;
color:#000;
text-decoration:none;}
#results{
height:64px;
width:64px;
background: url(images/results.png) no-repeat 0px 0px;
padding-top:15px;
padding-left:64px;
padding-bottom:35px;
color:#000;
text-decoration:none;}
#editacc{height:64px;
width:64px;
background: url(images/editaccount.png) no-repeat 0px 0px;
padding-top:15px;
padding-left:64px;
padding-bottom:35px;
color:#000;
text-decoration:none;}
#admin{
height:64px;
width:128px;
background: url(images/administration.png) no-repeat 0px 0px;
padding-top:15px;
padding-left:64px;
padding-bottom:35px;
color:#000;
text-decoration:none;}
#ban{height:64px;
width:180px;
background: url(images/banuser.png) no-repeat 0px 0px;
padding-top:15px;
padding-left:64px;
padding-bottom:35px;
color:#000;
text-decoration:none;}
#logout{height:64px;
width:64px;
background: url(images/logout.png) no-repeat 0px 0px;
padding-top:15px;
padding-left:64px;
padding-bottom:35px;
color:#000;
text-decoration:none;
}
#myacc{height:64px;
width:64px;
background: url(images/myaccount.png) no-repeat 0px 0px;
padding-top:15px;
padding-left:64px;
padding-bottom:35px;
color:#000;
text-decoration:none;}
#lnks{ margin-top: 130px;}
body{margin-top: 0px;margin-left: 0px;}
 </style>
<body align="center">
<div id="head" >
  <img src="images/banner.jpg">
</div>
 <div id="lnks" align="center">
<?php
echo "Welcome <b>$session->username</b> <br><br><br><br>";
?>
<table>
<tr><td>
<?php
  
   
      echo  "<td><a href=\"userinfo.php?user=$session->username\" id=\"myacc\">My Account</a> </td>";
   if(!$session->isAdmin()){
     echo "<td><a href=\"exam.php\" id=\"exam\">Exam</a> </td>"
     ."<td><a href=\"results.php?user=$session->username\" id=\"results\">Results</a> </td>";
    }
   echo  "<td><a href=\"useredit.php\" id=\"editacc\">Edit Account</a> </td>";
   if($session->isAdmin()){
      echo "<td><a href=\"results.php?admin=1\" id=\"results\">Results</a> </td>";
      echo "<td><a href=\"admin/admin.php\" id=\"admin\">Administration</a> </td>";
      echo "<td><a href=\"admin/banuser.php\" id=\"ban\">ban users & active users</a> </td>";
   }
   echo "<td><a href=\"process.php\" id=\"logout\">Logout</a></td>";
   echo "</tr></table></div></body></html>";
}
else{

include("login.php");
} ?>
