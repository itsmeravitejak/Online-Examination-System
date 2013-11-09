<?php
global $database;
 echo '<form action="" align="center" method="post">Select the topic <select name="topic">';
 $database->topicslist();
 echo '</select><input type="submit" value="go"></form>';
?>