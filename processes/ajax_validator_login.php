<?php

require_once "../includ/connect.php";

$email_login = $_POST['email_login'];
$password_login = $db->hashit($_POST['password_login']);
$select = $db->query("SELECT id_user FROM users WHERE email=? AND password=?", array($email_login,$password_login));
if ($select->affected_rows == 1) {
    echo json_encode([
        'user_login' => true
    ]);
} else {
    echo json_encode([
        'user_login' => false
    ]);
}

