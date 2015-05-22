<?php

require_once 'includ/connect.php';

//Login user
if (isset($_POST['btn_login'])) {
    $errors = array();
    $warnings = array();
    $success = array();
    if (!isset($_POST['email_login']) || (trim($_POST['email_login']) == '') || !isset($_POST['password_login']) || (trim($_POST['password_login']) == '')) {
        array_push($errors, " Insert your email and password in order to access your account.<br/>");
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
                header("location: notify.php");
            } else { 
                $_SESSION['id_user'] = $u[0]['id_user'];
                $_SESSION['rank'] = $u[0]['rank'];
                $select = $db->query("UPDATE users SET loged_in=1 WHERE id_user=?", array($_SESSION['id_user']));
                redirect();

            }
        } else {
            array_push($errors, "Incorrect email or password.<br/>Make sure you type the correct email and password for your account.");
            $_SESSION['errors'] = $errors;
            header("location: notify.php");
            exit();
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location: notify.php");
        exit();
    }
}

//Register user
if (isset($_POST['user_register'])) {
    $errors = array();
    $warnings = array();
    $success = array();
    if (!isset($_POST['first_name']) || (trim($_POST['first_name']) == '')) {
        array_push($errors, " Insert first name.<br/> ");
    } else {
        $first_name = $_POST['first_name'];
    }
    if (!isset($_POST['last_name']) || (trim($_POST['last_name']) == '')) {
        array_push($errors, " Insert last name.<br/> ");
    } else {
        $last_name = $_POST['last_name'];
    }

    if (!isset($_POST['email_register']) || (trim($_POST['email_register']) == '')) {
        array_push($errors, " Insert email.<br/> ");
    } else if (!filter_var($_POST['email_register'], FILTER_VALIDATE_EMAIL)) {
        array_push($errors, " Invalid email address.<br/> ");
    } else {
        $select = $db->query("SELECT email FROM users WHERE email=?", array($_POST['email_register']));
        //$e = $select->result;
        //$email_returned = $e[0]['email'];
        if ($select->affected_rows == 1) {
            array_push($errors, " The email address you entered is already used. Please provide another email.<br/>");
        } else {
            $email_register = $_POST['email_register'];
        }
    }

    if (!isset($_POST['password_register']) || (trim($_POST['password_register']) == '')) {
        array_push($errors, " Insert password.<br/> ");
    } else {
        $password_register = $db->hashit($_POST['password_register']);
    }
    if (!isset($_POST['repassword_register']) || (trim($_POST['repassword_register']) == '')) {
        array_push($errors, " Re-enter password.<br/> ");
    } else {
        $repassword_register = $db->hashit($_POST['repassword_register']);
        //$repassword_register = md5($_POST['repassword_register'].$db->salt());
    }
    if ($password_register != $repassword_register) {
        array_push($errors, " Passwords don't match.<br/> ");
    }
    if (isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year'])) {
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        if (!checkdate($month, $day, $year)) {
            array_push($errors, " The date of birth you entered is not a valid calendar date. ");
        } else {
            $birthday = $year . '-' . $month . '-' . $day;
        }
    } else {
        array_push($errors, " Insert birthday.<br/> ");
    }
    if (!isset($_POST['city']) || (trim($_POST['city']) == '')) {
        array_push($errors, " Insert city.<br/> ");
    } else {
        $city = $_POST['city'];
    }
    if (!isset($_POST['gender'])) {
        array_push($errors, " Select gender.<br/> ");
    } else {
        $gender = $_POST['gender'];
    }
    
    $ip = getenv('REMOTE_ADDR');

    if (empty($errors)) {
        $rank = 'a';
        if ($gender == 'm') {
            $avatar = '/users/' . $email_register . '/m.png';
        } else {
            $avatar = '/users/' . $email_register . '/f.png';
        }

        $sql = "INSERT INTO users
                (email,password,last_name,first_name,birthday,gender,city,rank,avatar,ip)
                VALUES (?,?,?,?,?,?,?,?,?,?)";

        $insert = $db->query($sql, array(
            $email_register, $password_register, $last_name, $first_name, $birthday, $gender, $city, $rank, $avatar, $ip));

        if ($insert->error) {
            array_push($errors, " A problem occurred during registration process!<br/>
                                  Try again later !");
            $_SESSION['errors'] = $errors;
            header("location: notify.php");
            exit();
        } else {
            $to = $email_register;
            $subject = "Activate account";
            $message = "<html>
                            <head>
                                <title>Account activation for social site</title>
                            </head>
                            <body>
                                <p>Please click on the link below to activate account !</p>
                                <a href='google.com'></a>
                            </body>
                        </html>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: <gabidinu987@gmail.com>" . "\r\n";
            //$headers .= 'Cc: myboss@example.com' . "\r\n";

            if (mail($to, $subject, $message, $headers)) {
                array_push($success, " Check your email to activate your account.<br/>");
                $_SESSION['success'] = $success;
                header("location: notify.php");
                exit();
            } else {
                array_push($errors, "There was a problem sending the email for activation.<br/>");
                $_SESSION['errors'] = $errors;
                header("location: notify.php");
                exit();
            }
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location: notify.php");
        exit();
    }
}

//Forgot password
if (isset($_POST['forgot_password_btn'])) {
    $errors = array();
    $warnings = array();
    $success = array();
    if (!(isset($_POST['forgot_password_email'])) && trim($_POST['forgot_password_email']) != '') {
        array_push($errors, "Please insert your email!<br/>");
        $_SESSION['errors'] = $errors;
        header("location: forgot_password.php");
        exit();
    } else {
        $email = $_POST['forgot_password_email'];
        //$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, " Invalid email address.<br/> ");
            $_SESSION['errors'] = $errors;
            header("location: forgot_password.php");
            exit();
        } else {
            $select = $db->query("SELECT id_user,last_name,first_name FROM users WHERE email=?", array($email));
            $u = $select->result;
            if ($select->affected_rows == 0) {
                array_push($errors, "The email you entered does not belong to any account.<br/>");
                $_SESSION['errors'] = $errors;
                header("location: forgot_password.php");
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
                    header("location: forgot_password.php");
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
                    header("location: forgot_password.php");
                    exit();
                } else {
                    array_push($errors, "The email could not be sent to the specified address.<br/>");
                    $_SESSION['errors'] = $errors;
                    header("location: forgot_password.php");
                    exit();
                }
            }
        }
    }
}
//
////modificare parola - utilizatorul logat poate schimba parola contului sau - autorizare administrator,profesor,student
//if (isset($_POST['modificare_parola'])) {
//    $errors = array();
//    if (!isset($_POST['parola_veche']) || (trim($_POST['parola_veche']) == '')) {
//        array_push($errors, "Va rugam introduceti parola veche !");
//    } else {
//        $pass = $_POST['parola_veche'];
//        $salt = $db->salt();
//        $parola = md5($pass . $salt);
//        $p = $db->interogare("SELECT password FROM utilizatori WHERE id_utl=?", array($_SESSION['id_utl']))->rezultat_interogare();
//        $parola_db = $p[0]['password'];
//        if ($parola != $parola_db) {
//            array_push($errors, "Contul dvs nu are aceasta parola.");
//        }
//    }
//
//    if (!isset($_POST['parola_noua']) || (trim($_POST['parola_noua']) == '')) {
//        array_push($errors, "Va rugam introduceti noua parola !");
//    } else {
//        $parola_noua = $_POST['parola_noua'];
//    }
//
//    if (!isset($_POST['re_parola_noua']) || (trim($_POST['re_parola_noua']) == '')) {
//        array_push($errors, "Va rugam introduceti parola noua in ambele campuri !");
//    } else {
//        $re_parola_noua = $_POST['re_parola_noua'];
//    }
//
//    if ($parola_noua != $re_parola_noua) {
//        array_push($errors, "Parola noua introdusa diferit !");
//    } else {
//        $newpassword = md5($parola_noua . $salt);
//    }
//    if (empty($errors)) {
//        $update = $db->interogare("UPDATE utilizatori SET password=? WHERE id_utl=?", array($newpassword, $_SESSION['id_utl']));
//        if ($update->error()) {
//            array_push($errors, "Nu s-a putut schimba parola");
//            $_SESSION['errors'] = $errors;
//            header("location: modificare_parola.php");
//            exit();
//        } else {
//            header("location: index.php");
//        }
//    } else {
//        $_SESSION['errors'] = $errors;
//        header("location: modificare_parola.php");
//    }
//}


