<?php
require_once "../includ/connect.php";

$select = $db->query("SELECT email FROM users WHERE email=?", array($_POST['email']));
if ($select->affected_rows == 1) {
    echo json_encode([
        'user_available'=>false
    ]);
} else {
    echo json_encode([
        'user_available'=>true
    ]);
}

