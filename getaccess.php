<?php

require'db.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && $_POST['password']) {

    $login = $_POST['login'];
    $pas = $_POST['password'];


    if (get_admin_login($login, $pas) > 0 ) {
        session_start();
        $_SESSION['admin'] = true;
        $script = 'adminpanel.php';
    }
    else
    $script = 'admin_avt.php';

    header("Location: $script");
} else {
    echo "Error! one of the values was not declared!"
}

?>