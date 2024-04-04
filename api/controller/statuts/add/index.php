<?php
// Created by Manfred MOUKATE on 4/4/24, 2:40 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/4/24, 2:40 PM


header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '../conf.php')
    http_response_code(403);
try {
    Criteria::_formRequiredCheck([TOKEN, NAME, REFRNC, COLOR, ABSTRCT ], $_POST);

    if(isset($_POST[TOKEN]) && $_POST[TOKEN] !== 'null' && $_POST[TOKEN] !== '' ){
        $statut = Statut::_get(Criteria::TOKEN, trim($_POST[TOKEN]));
        if (!($statut instanceof Statut))
            return false;
        $statut->setName($_POST[NAME]);
        $statut->setReference($_POST[REFRNC]);
        $statut->setColor($_POST[COLOR]);
        $statut->setAbstract($_POST[ABSTRCT]);
        $statut->save();

    } else {
        Statut::checkStatut($_POST[NAME]);
        $statut = (new Statut(null,null,$_POST[NAME],$_POST[REFRNC],$_POST[COLOR],$_POST[ABSTRCT] ))->save();

    }

    if ($statut instanceof Statut){
        Reply::_success($statut->toArray());
    }
    else{
        Reply::_error('sorry!!! could not register the new contact');
    }
} catch (Exception $exception) {
    Reply::_exception($exception);
}