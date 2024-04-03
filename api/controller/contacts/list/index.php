<?php

require dirname(__DIR__, 3). '../conf.php';
try{
    
    Reply::_success( Contact::_list()); 
}catch(Exception $e){
    $contacts = [];
}