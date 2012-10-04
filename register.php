<?php
/**
 * Register.php
 * 
 * Displays the registration form if the user needs to sign-up,
 * or lets the user know, if he's already logged in, that he
 * can't register another name.
 *
 */
include("include/session.php");
$_SESSION['url']="./";
global $database;
?>

<html>
<title>Registration Page</title>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
$(function(){
$("#user").focus();
	
	$("#signup").validate({
		rules: {
			captcha: {
				required: true,
				remote: "rem.php"
			},
			user: {
			required: true,
                  minlength: 5,
			remote: "rem2.php"
			},
			pass: {
			required: true,
			minlength: 5
			},
			reppass: {
			required:true,
			equalTo: "#pass"
			},
			email: {
			required: true,
			email: true
			},
			branch: {
			required: true
			}
		},
		messages: {
			captcha: "Enter the code in image correctly"	,
			reppass: {
			equalTo: "Enter the same password again"
			},
			user: {
			remote: "Username already taken or incorrect"
			}
		},
			success: function(label) {
			label.html("&nbsp;").addClass("valid");
		}
				
	});
	
});

</script>
<style>
body{background-color:#000;color:#fff;}
#signup label.error{  background:url("images/unchecked.gif") no-repeat 0px 0px;
  padding-left: 16px;
  padding-bottom: 2px;
  font-weight: bold;
  color: #EA5200;
}
#signup label.valid{ background:url("images/checked.gif") no-repeat 0px 0px;

}
</style>
<body>

<?php
/**
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
$_SESSION['url']="./";
   echo "<h1>Registered</h1>";
   echo "<p>We're sorry <b>$session->username</b>, but you've already registered under $session->branchid. "
       ."<a href=\"./\">Main</a>.</p>";
}
/**
 * The user has submitted the registration form and the
 * results have been processed.
 */
else if(isset($_SESSION['regsuccess'])){

   /* Registration was successful */
   if($_SESSION['regsuccess']){
      echo "<h1>Registered!</h1>";
      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your information has been added to the database, "
          ."log in</p>";
   }
   /* Registration failed */
   else{
      echo "<h1>Registration Failed</h1>";
      echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
          ."could not be completed.<br>Please try again at a later time.</p>";
   }
   unset($_SESSION['regsuccess']);
   unset($_SESSION['reguname']);
}
/**
 * The user has not filled out the registration form yet.
 * Below is the page with the sign-up form, the names
 * of the input fields are important and should not
 * be changed.
 */
else{
?>

<h1>Register</h1>
<?php
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
}
?>
<form action="process.php" id="signup" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr><td>Username:</td><td><input type="text" id="user" name="user" maxlength="30" value=""></td></tr>
<tr><td>Password:</td><td><input type="password" id="pass" name="pass" maxlength="30" value=""></td></tr>
<tr><td>Repeat Password</td><td><input type="password" id="reppass" name="reppass" ></td></tr>
<tr><td>Email:</td><td><input type="text" name="email" maxlength="50" id="email" value=""></td></tr>
<tr><td>enter the code <img src="include/securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>"></td><td><input type="text" name="captcha" id="captcha" maxlength="5" value="<?php echo $form->value("captcha"); ?>"></td><td><?php echo $form->error("captcha"); ?></td></tr>
<tr><td>branch</td><td><select name='branch'><?php $database->pbrnches();?></select></td></tr>
<tr><td  align="right">
<input type="hidden" name="subjoin" value="1">
<input type="submit" value="Join!"></td></tr>

</table>
</form>

<?php
}
?>

</body>
</html>
