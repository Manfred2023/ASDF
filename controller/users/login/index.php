<?php
session_start();

header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '/conf.php')
    http_response_code(403);
try { 

    # Check required fields
    Criteria::_formRequiredCheck([EMAIL, PASSWORD], $_POST);
    $user = User::_get(Criteria::EMAIL, $_POST[EMAIL]);
   
    if (!($user instanceof User))
        return header('location:../../../../webapp/views/signin.php');
       
    
    if(password_verify($_POST[PASSWORD], $user->getPassword())){
        /* Reply::_success($user->toArray()); */
        
        $_SESSION['auth'] = 'ok';
        return header('location:../../../../webapp/views/index.php');
    }
    else{
        return header('location:../../../../webapp/views/signin.php');
        
    }
} catch (Exception $exception) {
    Reply::_exception($exception);
}
