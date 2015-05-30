<?php
require_once "/includ/connect.php";

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


