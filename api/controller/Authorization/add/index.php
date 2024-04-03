<?php
// Created by Manfred MOUKATE on 4/3/24, 3:12 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 3:12 PM


header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '../conf.php')
    http_response_code(403);
try {
    Criteria::_formRequiredCheck([TOKEN, NAME, RESUME], $_POST);
    if(isset($_POST[TOKEN]) && $_POST[TOKEN] !== 'null' && $_POST[TOKEN] !== '' ){
        $authorization = Authorization::_get(Criteria::TOKEN, trim($_POST[TOKEN]));
        if (!($authorization instanceof Authorization))
            return false;
        $authorization->setName($_POST[NAME]);
        $authorization->setResume($_POST[RESUME]); ;
        $authorization->save();
    } else {
        Contact::checkNumber($_POST[MOBILE]);
        $authorization = (new Authorization(null,null,$_POST[NAME],$_POST[RESUME]  ))->save();

    }

    if ($authorization instanceof Authorization){
        Reply::_success($authorization->toArray());
    }
    else{
        Reply::_error('sorry!!! could not register the new contact');
    }
} catch (Exception $exception) {
    Reply::_exception($exception);
}
