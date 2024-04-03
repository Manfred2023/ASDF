<?php
// Created by Manfred MOUKATE on 4/3/24, 2:16 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:16 PM

require dirname(__DIR__, 3). '../conf.php';
try{
    Reply::_success( Profile::_list()); 
}catch(Exception $e){

    Reply::_error("is empty");
}