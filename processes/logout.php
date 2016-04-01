<?php
require_once "../includ/connect.php";

session_start();
$update = $db->query("UPDATE users SET logged=0 WHERE id_user=?", array($_SESSION['id_user']));
$_SESSION = array();
setcookie(session_name(), '', time()-42000, '/');
session_destroy();
header('Location:../index.php');