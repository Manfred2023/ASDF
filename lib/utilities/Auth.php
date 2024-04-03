<?php

// Vérification de l'authentification basique
if (!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}
$providedUsername = $_SERVER['PHP_AUTH_USER'];
$providedPassword = $_SERVER['PHP_AUTH_PW'];

$user = R::findOne('user', 'email = ?', [$providedUsername]);


