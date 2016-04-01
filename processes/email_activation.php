<?php

if (isset($_GET['idu']) && isset($_GET['ecv'])) {
    require_once "../includ/connect.php";
    $idu = $_GET['idu'];
    $ecv = $_GET['ecv'];
    
    $errors = array();
    $warnings = array();
    $success = array();
    
    if (!isset($idu) || trim($idu) == "" || !isset($ecv) || trim($ecv) == "") {      
        array_push($errors, " There are no credentials to validate your account. <br/>");
        $_SESSION['errors'] = $errors;
        header("location: ../notify.php");
        exit();
    } else {
        $select = $db->query("SELECT email FROM users WHERE id_user=? AND email_code_validation=?", array($idu, $ecv));
        $u = $select->result;
        if ($select->affected_rows == 1) {
            $update = $db->query("UPDATE users SET activated='1' WHERE id_user=?", array($idu));
            array_push($success, " Your account has been succesfully activated.<br/>");
            $_SESSION['success'] = $success;
            header("location: ../notify.php");
            exit();
        } else {
            array_push($errors, " The credentials to validate your account are incorrect. <br/>");
            $_SESSION['errors'] = $errors;
            header("location: ../notify.php");
            exit();
        }
    }
} else {
    header("location: ../index.php");
    exit();
}
