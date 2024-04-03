<?php
// Created by Manfred MOUKATE on 4/3/24, 3:20 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 3:20 PM

require dirname(__DIR__, 3). '../conf.php';
try{

    Reply::_success( Authorization::_list());
}catch(Exception $e){
    $contacts = [];
}