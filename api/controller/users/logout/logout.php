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
    if (isset($_POST['destroySession'])) {
        session_destroy();
        Reply::_success("Logout");    
    }
   
} catch (Exception $exception) {
    Reply::_exception($exception);
}
