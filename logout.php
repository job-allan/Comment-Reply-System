<?php session_start(); ?>
<?php


unset($_SESSION['auth_user_id']);
unset($_SESSION['auth_username']);

$_SESSION['status'] = "Logged out";
header("Location: index.php");
exit();


 ?>
