<html>
    <head>
        <title>TEST</title>
</head>

<?php

$user = 'root';
$pass = '';
$db = 'bloodbankdb';

$temp = new mysqli('localhost', $user, $pass, $db) or die("UNABLE TO CONNECT !!!! YOUR ABCKEND DSIGNER SUCKS.");

echo "<h2>PHP is Fun!</h2>";
echo "Hello world!<br>";
echo "I'm about to learn PHP!<br>";
echo "This ", "string ", "was ", "made ", "with multiple parameters.";

?>

</html>