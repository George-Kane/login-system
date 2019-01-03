<?php session_start();

$_SESSION['username'] = null;
$_SESSION['error'] = null;
    
header("Location: ./index.php");

