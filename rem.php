<?php
include("include/securimage.php");
     $img = new Securimage();
     $valid = $img->check($_GET['captcha']);
     if(!$valid)
     echo "false";
     else
     echo "true";
?>