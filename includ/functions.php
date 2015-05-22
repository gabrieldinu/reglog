<?php

function escape($string) {
    return htmlspecialchars($string, ENT_QUOTES, "utf-8");
}

function redirect() {
    if (isset($_SESSION['id_user']) && isset($_SESSION['rank'])) {
        if ($_SESSION['rank'] == 'a') {
            header('Location:admin.php');
        } elseif ($_SESSION['rank'] == 'b') {
            header('Location:user.php');
        }
    }
}

function notify() {
    if (isset($_SESSION['errors'])) {
        $errors = implode(" ", $_SESSION['errors']);
        unset($_SESSION['errors']);
        echo '               
                 <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="display">
                        <strong>ERROR:</strong>
                        <br/><hr/>
                        ' . $errors . '
                    </div>                                  
                 </div>';
    } else if (isset($_SESSION['success'])) {
        $success = implode(" ", $_SESSION['success']);
        unset($_SESSION['success']);
        echo '            
                 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="display">
                        <strong>SUCCESS:</strong>
                        <br/><hr/>
                        ' . $success . '
                    </div>                   
                 </div>';
    } else if (isset($_SESSION['warnings'])) {
        $warnings = implode(" ", $_SESSION['warnings']);
        unset($_SESSION['warnings']);
        echo '            
                 <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="display">
                        <strong>WARNING:</strong>
                        <br/><hr/>
                        ' . $warnings . '
                    </div>                   
                 </div>';
    }
}

function getIP(){
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
}

function gLocation($atrlocation){
    if (isset($atrlocation)){
        return '';      
    }
    return $atrlocation;
}
