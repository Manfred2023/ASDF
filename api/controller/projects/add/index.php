<?php
// Created by Manfred MOUKATE on 4/4/24, 2:40 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/4/24, 2:40 PM


header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '../conf.php')
    http_response_code(403);
try {
    Criteria::_formRequiredCheck([TOKEN, TITLE, OBJCTV, COMMENT, PARTCPNT, DATTM,CITY, STATUT ], $_POST);
    $date = new DateTime($_POST[DATTM]);
    $date->format('Y-m-d H:i:s');

    if (!($city = City::_get(Criteria::TOKEN, trim($_POST[CITY]))) instanceof City)
        Reply::_error("City isn't already register, make sure to register it first!");
    if (!($statut = Statut::_get(Criteria::TOKEN, trim($_POST[STATUT]))) instanceof Statut)
        Reply::_error("City isn't already register, make sure to register it first!");

    if(isset($_POST[TOKEN]) && $_POST[TOKEN] !== 'null' && $_POST[TOKEN] !== '' ){
        $project = Project::_get(Criteria::TOKEN, trim($_POST[TOKEN]));
        if (!($project instanceof Project))
            return false;
        $project->setTitle($_POST[TITLE]);
        $project->setObjective($_POST[OBJCTV]);
        $project->setComment($_POST[COMMENT]);
        $project->setParticipant(array($_POST[PARTCPNT]));
        $project->setLaunch($_POST[DATTM]);
        $project->setCity($city);
        $project->setStatut($statut);
        $project->save();
    } else {
        $project = (new Project(null,null,$_POST[TITLE],$_POST[OBJCTV],$_POST[COMMENT],array($_POST[PARTCPNT]),$_POST[DATTM],$city,$statut, ))->save();
    }
    if ($project instanceof Project){
        Reply::_success($project->toArray());
    }
    else{
        Reply::_error('sorry!!! could not register the new contact');
    }
} catch (Exception $exception) {
    Reply::_exception($exception);
}