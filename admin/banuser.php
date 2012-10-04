<?php

include("../include/session.php");

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function activeUsers(){
   global $database;
   $q = "SELECT * "
       ."FROM active_users ";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Last Active</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");     
      $time   = mysql_result($result,$i,"timestamp");
      echo "<tr><td><a href=\"../userinfo.php?user=$uname\">$uname</a></td><td>".date("d-m-y h:m:s",$time)."</td></tr>\n";
   }
   echo "</table><br>\n";
}
function activeGuests(){
   global $database;
   $q = "SELECT * "
       ."FROM active_guests ";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>IP Address</b></td><td><b>Last Active</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"ip");     
      $time   = mysql_result($result,$i,"timestamp");
      echo "<tr><td><a href=../userinfo.php?user=$uname>$uname</a></td><td>".date("d-m-y h:m:s",$time)."</td></tr>\n";
   }
   echo "</table><br>\n";
}
/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers(){
   global $database;
   $q = "SELECT username,timestamp "
       ."FROM ".TBL_BANNED_USERS." ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Time Banned</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $time  = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}
   
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){
   header("Location: ../");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */
?>
<html>
<title>Talent Hunt:ban users & activeusers</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />

<style>
 body{background:url(../images/banner.jpg) top center no-repeat ;margin-top:250px;}
 </style>
<body>
<h1>Admin Center:ban users & active users</h1>

Back to [<a href="../">Main Page</a>]<br><br>
<?php
if($form->num_errors > 0){
   echo "<font size=\"4\" color=\"#ff0000\">"
       ."!*** Error with request, please fix</font><br><br>";
}
?>
<table align="left" border="0" cellspacing="5" cellpadding="5">
<tr><td>
<?php
/**
 * Display Users Table
 */
?>
<h3>Active Users Table Contents:</h3>
<?php
activeUsers();
?>
</td></tr>
<tr>
<tr><td>
<?php
/**
 * Display active guests Table
 */
?>
<h3>Active Guests Table Contents:</h3>
<?php
activeGuests();
?>
</td></tr>
<tr>
<td>
<?php
/**
 * Delete Inactive Users
 */
?>
<h3>Delete Inactive Users</h3>
This will delete all users (not administrators), who have not logged in to the site<br>
within a certain time period. You specify the days spent inactive.<br><br>
<table>
<form action="adminprocess.php" method="POST">
<tr><td>
Days:<br>
<select name="inactdays">
<option value="3">3
<option value="7">7
<option value="14">14
<option value="30">30
<option value="100">100
<option value="365">365
</select>
</td>
<td>
<br>
<input type="hidden" name="subdelinact" value="1">
<input type="submit" value="Delete All Inactive">
</td>
</form>
</table>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?php
/**
 * Ban User
 */
?>
<h3>Ban User</h3>
<?php echo $form->error("banuser"); ?>
<form action="adminprocess.php" method="POST">
Username:<br>
<input type="text" name="banuser" maxlength="30" value="<?php echo $form->value("banuser"); ?>">
<input type="hidden" name="subbanuser" value="1">
<input type="submit" value="Ban User">
</form>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr><td>
<?php
/**
 * Display Banned Users Table
 */
?>
<h3>Banned Users Table Contents:</h3>
<?php
displayBannedUsers();
?>
</td></tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?php
/**
 * Delete Banned User
 */
?>
<h3>Delete Banned User</h3>
<?php echo $form->error("delbanuser"); ?>
<form action="adminprocess.php" method="POST">
Username:<br>
<input type="text" name="delbanuser" maxlength="30" value="<?php echo $form->value("delbanuser"); ?>">
<input type="hidden" name="subdelbanned" value="1">
<input type="submit" value="Delete Banned User">
</form>
</td>
</tr>
</table>

</body>
</html>
<?php
}
?>

