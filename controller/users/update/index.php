<?php


header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '/conf.php')
    http_response_code(403);

try { 

    # Check required fields
    Criteria::_formRequiredCheck([EMAIL, PASSWORD, PHONE], $_POST);
    
    $user = User::_get(Criteria::TOKEN, $_POST[TOKEN]);
   
    

    $user->setEmail($_POST[EMAIL]);
    $user->setPassword($_POST[PASSWORD]);
    $user->setNumber($_POST[PHONE]);

    $c = $user->save();
    if ($c instanceof User)
    $token = $user->getToken();
    header('location:../../../../webapp/views/profileEdit.php?token=' . urlencode($token));
    exit();

    Reply::_error('sorry!!! could not update the contact');
} catch (Exception $exception) {
    Reply::_exception($exception);
}