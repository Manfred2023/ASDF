<?php


session_start();

if ($_SESSION['auth'] != 'ok'){
    header('location: screen/auth/index.php');
    exit();
}
else{
    header('location: auth/index.php');
}
