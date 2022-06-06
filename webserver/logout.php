<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['msg']);
$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: index.php");

?>