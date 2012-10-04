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
 body{background:url(images/banner.jpg) top center no-repeat ;margin-top:250px;}
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
 </style>
<body>

<table>
<tr><td>
<?php
  
   echo "Welcome <b>$session->username</b> <br><br><br><br>"
       ."<a href=\"userinfo.php?user=$session->username\" id=\"myacc\">My Account</a> &nbsp;&nbsp;";
   if(!$session->isAdmin()){
     echo "<a href=\"exam.php\" id=\"exam\">Exam</a> &nbsp;&nbsp;"
     ."<a href=\"results.php?user=$session->username\" id=\"results\">Results</a> &nbsp;&nbsp;";
    }
   echo  "<a href=\"useredit.php\" id=\"editacc\">Edit Account</a> &nbsp;&nbsp;";
   if($session->isAdmin()){
      echo "<a href=\"admin/admin.php\" id=\"admin\">Administration</a> &nbsp;&nbsp;";
      echo "<a href=\"admin/banuser.php\" id=\"ban\">ban users & active users</a> &nbsp;&nbsp;";
   }
   echo "<a href=\"process.php\" id=\"logout\">Logout</a>";
   echo "</td></tr></table></body></html>";
}
else{

include("login.php");
} ?>
