<?php
require_once "../includ/connect.php";

//Forgot password
if (isset($_POST['forgot_password_btn'])) {
    $errors = array();
    $warnings = array();
    $success = array();
    if (!(isset($_POST['forgot_password_email'])) && trim($_POST['forgot_password_email']) != '') {
        array_push($errors, "Please insert your email!<br/>");
        $_SESSION['errors'] = $errors;
        header("location: ../forgot_password.php");
        exit();
    } else {
        $email = $_POST['forgot_password_email'];
        //$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, " Invalid email address.<br/> ");
            $_SESSION['errors'] = $errors;
            header("location: ../forgot_password.php");
            exit();
        } else {
            $select = $db->query("SELECT id_user,last_name,first_name FROM users WHERE email=?", array($email));
            $u = $select->result;
            if ($select->affected_rows == 0) {
                array_push($errors, "The email you entered does not belong to any account.<br/>");
                $_SESSION['errors'] = $errors;
                header("location: ../forgot_password.php");
                exit();
            } else {
                $id_user = $u[0]['id_user'];
                $last_name = $u[0]['last_name'];
                $first_name = $u[0]['first_name'];

                $temp_pass = $db->hashit(rand(100000, 999999));

                $update = $db->query("UPDATE users SET temp_pass=? WHERE id_user=?", array($temp_pass, $id_user));

                if ($update->error) {
                    array_push($errors, "There was a problem updating the temporary password.</br> ");
                    $_SESSION['errors'] = $errors;
                    header("location: ../forgot_password.php");
                    exit();
                } else {
                    $to = $email;
                    $subject = "Reset password account";
                    $message = "Hello did you forgot your password ?";                    
                    $headers = "From: <gabidinu987@gmail.com>";
                    //$headers .= 'Cc: myboss@example.com' . "\r\n";
                }
                if (mail($to, $subject, $message, $headers)) {
                    array_push($success, "An message has been sent to your email address.</br>");
                    $_SESSION['success'] = $success;
                    header("location: ../forgot_password.php");
                    exit();
                } else {
                    array_push($warnings, "The email could not be sent.<br/> Please try again later.<br/>");
                    $_SESSION['warnings'] = $warnings;
                    header("location: ../forgot_password.php");
                    exit();
                }
            }
        }
    }
}