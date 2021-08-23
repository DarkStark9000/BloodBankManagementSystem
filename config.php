<?php

$con = mysqli_connect ("localhost", "root", "") or die ('Cannot connect to the database because: ' . mysql_error());

mysqli_select_db ($con,'bloodbankdb');

?>
