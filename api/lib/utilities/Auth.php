<?php
// Created by Manfred MOUKATE on 4/3/24, 2:17 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:17 PM

// Vérification de l'authentification basique
if (!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}
$providedUsername = $_SERVER['PHP_AUTH_USER'];
$providedPassword = $_SERVER['PHP_AUTH_PW'];

$user = R::findOne('user', 'email = ?', [$providedUsername]);


