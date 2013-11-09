<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
  <title>Talent Hunt</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link href="css/colorbox.css" rel="stylesheet">
  <script src="js/shortcut.js"></script>
 <style>
 a:visited img {border: 0; }
 #in{padding-left:225px;}
 
#login{color:#fff;height:100px;width:400px;padding:30px 0px 0px 10px;}
#login label.error{
  color: red;
  background:url("images/unchecked.gif") no-repeat 0px 0px;
  padding:0px 0px 0px 14px;
  }
body{margin-top: 0px;margin-left: 0px;}
#head a{background:url(images/aboutus.png) no-repeat 0px 0px;display:block;text-indent:-9999px;height:39px;width:133px;float:right;margin-right: 5%;}
#head a:hover{background-image:url(images/aboutus-hover.png)}
#aboutus{color: white;}
#lnks{ margin-top: 130px;}
#loginlnk{padding-right:123px;}
#registerlnk{padding-left:123px;}
#tag{width:500px;height:40px;background-color:#691818;color:#e1dfdf;font-size:200%;padding-left:3px;border-bottom:6px solid #000;}
#data tr{background-color:#BC7E7E;color:#301A1A;}
#data td{font-size:19px;}
#data{width:500px;padding-left:3px;}
#data .altrow{background-color:#301A1A;color:#BC7E7E;}
#footer{bottom: 0;position:fixed;margin-left: 45%;}
 </style>
 <script src="js/jquery.js"></script>
<script src="js/jquery.colorbox.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
$(document).ready(function(){
$("#data tr:odd").addClass("altrow");
$("#loginlnk").colorbox({inline:true,href:"#login",onLoad:function(){shortcut.remove("l");},onClosed:
function(){shortcut.add("l",function() {
$("#loginlnk").click();
});},onComplete:function(){ $("#user").focus(); }});
$("#registerlnk").colorbox({width:"80%", height:"80%", iframe:true});
$("#loginfrm").validate();
$("#aboutlnk").colorbox({inline:true,href:"#aboutus"});
});
shortcut.add("l",function() {
	$("#loginlnk").click();
});
</script>

</head>

<body align="center">
<div id="head"  align="center">
  <img src="images/banner.jpg">
</div>
 <div id="lnks" align="center">
<?php
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
}?>

        <a href="#" id="loginlnk" title="Login"><img src="images/login.jpg"  style="border:0;"></a>
        <a href="register.php" id="registerlnk"><img  src="images/register.jpg" style="border:0;"></a>

 </div>
  <div style='display:none'>
  <div id="aboutus">
  <div id="tag">Ravi Teja</div>
   hey this is me man
   test 
   lets see<br>
  </div>
<div id="login" >
<?php echo $form->error("user"); ?>
<?php echo $form->error("pass"); ?>
<form id="loginfrm" action="process.php" method="POST">
<table>
<tr><td>Username:</td><td><input type="text" name="user" id="user" class="required" value="<?php echo $form->value("user"); ?>"></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" class="required"></td></tr>
<tr><td><input type="submit" value="login"></td></tr>
</table>
<input type="hidden" name="sublogin" value="1">
</form>
</div>
<div id="register"></div>
</div>
<div id="footer"  ><a href="#" id="aboutlnk">&copy; Development Team </a></div>
</body>
</html>
