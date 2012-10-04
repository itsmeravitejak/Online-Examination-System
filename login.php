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
 body{background:url(images/banner.jpg) top center no-repeat ;}
#login{color:#fff;height:100px;width:400px;padding:30px 0px 0px 10px;}
#login label.error{
  color: red;
  background:url("images/unchecked.gif") no-repeat 0px 0px;
  padding:0px 0px 0px 14px;
  }
#head a{background:url(images/aboutus.png) no-repeat 0px 0px;display:block;text-indent:-9999px;height:39px;width:133px;margin-left:700px;}
#head a:hover{background-image:url(images/aboutus-hover.png)}
#aboutus{color:#e1dfdf;padding:20px 15px 10px 15px;}
#lnks{padding-top:350px;}
#loginlnk{padding-right:123px;}
#registerlnk{padding-left:123px;}
#tag{width:500px;height:40px;background-color:#691818;color:#e1dfdf;font-size:200%;padding-left:3px;border-bottom:6px solid #000;}
#data tr{background-color:#BC7E7E;color:#301A1A;}
#data td{font-size:19px;}
#data{width:500px;padding-left:3px;}
#data .altrow{background-color:#301A1A;color:#BC7E7E;}
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

<body >
<div id="head" align="center"><a href="#" id="aboutlnk">About us</a></div>
 <div id="lnks">
<?php
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
}?>
<center>
        <a href="#" id="loginlnk" title="Login"><img src="images/login.jpg"  style="border:0;"></a>
        <a href="register.php" id="registerlnk"><img  src="images/register.jpg" style="border:0;"></a>
</center>
 </div>
  <div style='display:none'>
  <div id="aboutus">
  <div id="tag">Development team</div>
<table id="data" cellspacing=0 cellpadding=10>
<tr><td>07030-cm-050</td><td >K.RaviTeja</td></tr>
<tr><td>07030-cm-020</td><td>Yeswanth</td></tr>
<tr><td>07030-cm-036</td><td>Farid Khan</td></tr>
<tr><td>07030-cm-001</td><td>A.HariKrishna(AHK)</td></tr>
</table>
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

</body>
</html>
