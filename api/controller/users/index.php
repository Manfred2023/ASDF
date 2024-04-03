<?php
// Created by Manfred MOUKATE on 4/3/24, 2:17 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:17 PM

require dirname(__DIR__, 2). '/conf.php';
try{

    Reply::_success(User::_list());                                                 
    

}catch(Exception $e){

}