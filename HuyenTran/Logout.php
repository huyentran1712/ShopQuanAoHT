<?php 
session_start();
//require 'class/Auth.php';
//Auth::logout();
unset($_SESSION['admin']);
unset($_SESSION['username']);
header('location: Login.php');
?>