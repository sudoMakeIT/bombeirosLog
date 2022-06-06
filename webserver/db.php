<?php
/* Database connection settings */
$host = $_ENV["MYSQL_HOST"];
$user = 'bombeiros';
$pass = 'bombeiros';
$db = 'bombeiros';

$dbc = @mysqli_connect($host, $user, $pass, $db);

?>