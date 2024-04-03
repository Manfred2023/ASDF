<?php
session_start();

header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '/conf.php')
    http_response_code(403);
try { 
    if (isset($_POST['destroySession'])) {
        // Détruire la session
        session_destroy();
        
        // Rediriger vers la page de connexion ou une autre page appropriée
        header("Location:signin.php");
        exit();
    }
   
} catch (Exception $exception) {
    Reply::_exception($exception);
}
