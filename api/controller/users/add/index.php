<?php
// Created by Manfred MOUKATE on 4/3/24, 2:17 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:17 PM

header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '/conf.php')
    http_response_code(403);

try {
    # Check required fields
    Criteria::_formRequiredCheck([TOKEN, EMAIL, PASSWORD,  CONTACT, PROFIL, STATUT], $_POST);
    if (!($contact = Contact::_get(Criteria::TOKEN, trim($_POST[CONTACT]))) instanceof Contact)
    Reply::_error("Contact isn't already register, make sure to register it first!");

    if (!($profile = Profile::_get(Criteria::TOKEN, trim($_POST[PROFIL]))) instanceof Profile)
    Reply::_error("Profil isn't already register, make sure to register it first!");

    if (!User::isEmailFormatValid($_POST[EMAIL])) {
        Reply::_error("Invalid email format");
    }

    if(isset($_POST[TOKEN]) && $_POST[TOKEN] !== 'null'){
        $user = User::_get(Criteria::TOKEN, trim($_POST[TOKEN]));
        if (!($user instanceof User))
            return false;
        $user->setEmail($_POST[EMAIL]);
        $user->setPassword($_POST[PASSWORD]);
        $user->setContact($contact);
        $user->setProfile($profile); 
        $user->setStatut($_POST[STATUT]); 
        $user->save();

    } else {
        User::checkEmail($_POST[EMAIL]); 
        $user = (new User(NULL, NULL, $_POST[EMAIL], password_hash($_POST[PASSWORD], PASSWORD_DEFAULT),$contact,$profile, $_POST[EMAIL] ));
        
    }
    if ($user instanceof User){
        Reply::_success($user->toArray()); 
    }
    else{
        Reply::_error('sorry!!! could not register the new contact');
    } 

    
} catch (Exception $exception) {
    Reply::_exception($exception);
}