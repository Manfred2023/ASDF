<?php
// Created by Manfred MOUKATE on 4/3/24, 2:17 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:17 PM

session_start();

header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '/conf.php')
    http_response_code(403);
try { 

    # Check required fields
    Criteria::_formRequiredCheck([EMAIL, PASSWORD], $_POST);
    $user = User::_get(Criteria::EMAIL, $_POST[EMAIL]);
    if (!($user instanceof User))
        return false;
  
    if(password_verify($_POST[PASSWORD], $user->getPassword())){
        $_SESSION['auth'] = 'ok';
        Reply::_success("request_was_successfully_processed");  
        echo "Page non trouvée";
    } else{
        Reply::_error('user_authentication_failed');
        echo "Page non trouvée";
    }
    
} catch (Exception $exception) {
    Reply::_exception($exception);
}
