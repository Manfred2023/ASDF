<?php
session_start();

header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '/conf.php')
    http_response_code(403);
try { 
    if (isset($_POST['destroySession'])) {
        session_destroy();
        Reply::_success("Logout");    
    }
   
} catch (Exception $exception) {
    Reply::_exception($exception);
}
