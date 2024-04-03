<?php

require dirname(__DIR__, 3). '../conf.php';
try{
    Reply::_success( Profile::_list()); 
}catch(Exception $e){
    Reply::_error($profile []);
}