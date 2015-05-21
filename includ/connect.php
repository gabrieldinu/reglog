<?php
//include this file on all files to connect to database.

error_reporting(E_ALL);
session_start();

spl_autoload_register(function($class){
    require_once '/class/'.$class.'.php';
});

$db = DB::connect();

require_once 'functions.php';
?>