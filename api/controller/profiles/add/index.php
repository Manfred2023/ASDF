<?php
// Created by Manfred MOUKATE on 4/3/24, 2:16 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:16 PM

header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '../conf.php')
    http_response_code(403);
try {
        Criteria::_formRequiredCheck([TOKEN, NAME, RESUME, PARNT], $_POST);

    if(isset($_POST[TOKEN]) && $_POST[TOKEN] !== 'null'){
        $profile = Profile::_get(Criteria::TOKEN, trim($_POST[TOKEN]));
        if (!($profile instanceof Profile))
            return false;
        $profile->setName($_POST[NAME]);
        $profile->setResume($_POST[RESUME]);
        $profile->setParent($_POST[PARNT]); 
        $profile->save();

    } else {
        Profile::checkName($_POST[NAME]); 
        $profile = (new Profile(null,null,$_POST[NAME],$_POST[RESUME],$_POST[PARNT]))->save();
        
    }
   
    if ($profile instanceof Profile){
        Reply::_success($profile->toArray()); 
    }
    else{
        Reply::_error('sorry!!! could not register the new profil');
    }    
} catch (Exception $exception) {
    Reply::_exception($exception);
}

