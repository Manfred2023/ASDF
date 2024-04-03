<?php

header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '/conf.php') {
    http_response_code(403);
    exit;
}

try {
    // Vérifier si le token est présent dans le formulaire
    if (!isset($_POST['id'])) {
        Reply::_error_field('Token is missing in the form data');
        exit;
    }

    // Récupérer le token du formulaire
    $token = $_POST['id'];

    // Rechercher les informations de la company par token
    $userInfo = User::_getByID($token);

    if ($userInfo !== null) {
        // Les informations de la company ont été trouvées, renvoyer les détails
        Reply::_success($userInfo);
    } else {
        // La company n'a pas été trouvée
        Reply::_error_found('user not found');
    }

} catch (Exception $exception) {
    Reply::_exception($exception);
}