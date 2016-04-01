<?php

require_once "../includ/connect.php";

//Login user
//if (isset($_POST['btn_login'])) {
$errors = array();
$warnings = array();
$success = array();
if (!isset($_POST['email_login']) || (trim($_POST['email_login']) == '') || !isset($_POST['password_login']) || (trim($_POST['password_login']) == '')) {
    array_push($errors, " Insert email and password.<br/>");
} else {
    $email_login = $_POST['email_login'];
    $password_login = $db->hashit($_POST['password_login']);
}

if (empty($errors)) {
    $select = $db->query("SELECT * FROM users WHERE email=? AND password=?", array($email_login, $password_login));
    $u = $select->result;
    if ($select->affected_rows == 1) {
        $activated = $u[0]['activated'];
        if ($activated == 0) {
            array_push($warnings, " Your account is not activ!<br/>Check your email to activate your account.<br/>");
            $_SESSION['warnings'] = $warnings;
            header("location: ../notify.php");
        } else {
            $_SESSION['id_user'] = $u[0]['id_user'];
            $_SESSION['rank'] = $u[0]['rank'];
            $update = $db->query("UPDATE users SET logged=1 WHERE id_user=?", array($_SESSION['id_user']));
            if ($update->affected_rows == 0) {
                array_push($warnings, " There was a problem at logging you in to the system.<br/>");
                $_SESSION['warnings'] = $warnings;
                header("location: ../notify.php");
            }
            redirect();
        }
    } else {
        array_push($errors, "Incorrect email or password.<br/>Make sure you type the correct email and password for your account.");
        $_SESSION['errors'] = $errors;
        header("location: ../notify.php");
        exit();
    }
} else {
    $_SESSION['errors'] = $errors;
    header("location: ../notify.php");
    exit();
}
//}