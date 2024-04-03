<?php
// Created by Manfred MOUKATE on 4/3/24, 2:16 PM,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 4/3/24, 2:16 PM

header('Content-Type: application/json');

if (!require realpath(dirname(__DIR__, 3)) . '/conf.php')
    http_response_code(403);

try {
    # Check required fields
    Criteria::_formRequiredCheck([CNAMEFR, CNAMEFR, CODE, ALPHA2, ALPHA3, ], $_POST);

    // Vérifier si le pays existe déjà
    $existingCountry = Country::_get(Criteria::ALPHA2, $_POST[ALPHA2],);
    if ($existingCountry instanceof Country) {
        Reply::_error_create('error 409');
        exit;
    } else {
         // Créer un nouveau pays
    $country = (new Country(
        null,
        $_POST[CNAMEFR],
        $_POST[CNAMEEN],
        $_POST[CODE],
        $_POST[ALPHA2],
        $_POST[ALPHA3],
        $_POST[DIALCODE]
    ))->save();

    if ($country instanceof Country)
        Reply::_success($country->toArray());

    }

   
    Reply::_error('Sorry!!! Could not register the new country');
} catch (Exception $exception) {
    Reply::_exception($exception);
}
