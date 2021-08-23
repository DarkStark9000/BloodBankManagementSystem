<?php

session_start();
session_destroy();
header('Location: donorlogin.php');
exit;

?>