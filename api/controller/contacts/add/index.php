<?php
// Created by Manfred MOUKATE on 4/3/24, 2:15 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:15 PM

header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '../conf.php')
    http_response_code(403);
try {
    Criteria::_formRequiredCheck([TOKEN, FSTNAME, LSTNAME, MOBILE, GENDER, CITY, WHTSPP, OFFICE], $_POST);
    if (!($city = City::_get(Criteria::TOKEN, trim($_POST[CITY]))) instanceof City)
        Reply::_error("City isn't already register, make sure to register it first!");
   

    if(isset($_POST[TOKEN]) && $_POST[TOKEN] !== 'null' && $_POST[TOKEN] !== '' ){
        $contact = Contact::_get(Criteria::TOKEN, trim($_POST[TOKEN]));
        if (!($contact instanceof Contact))
            return false;
        $contact->setFirstname($_POST[FSTNAME]);
        $contact->setLastname($_POST[LSTNAME]);
        $contact->setGender($_POST[GENDER]);
        $contact->setMobile($_POST[MOBILE]);
        $contact->setCity($city);
        $contact->setwhatsapp($_POST[WHTSPP]);
        $contact->setoffice($_POST[OFFICE]);
        $contact->save();

    } else {
        Contact::checkNumber($_POST[MOBILE]); 
        $contact = (new Contact(null,null,$_POST[GENDER],$_POST[FSTNAME],$_POST[LSTNAME],$city,$_POST[MOBILE],$_POST[WHTSPP],$_POST[OFFICE] ))->save();
        
    }
   
    if ($contact instanceof Contact){
        Reply::_success($contact->toArray()); 
    }
    else{
        Reply::_error('sorry!!! could not register the new contact');
    }    
} catch (Exception $exception) {
    Reply::_exception($exception);
}

