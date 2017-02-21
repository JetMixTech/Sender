<?php

function validate($data) {
    $errors = [];

    if (empty($data['companyName'])) {
        array_push($errors, ['companyName' => 'Field cannot be blank']);
    }

    if (empty($data['companyMail'])) {
        array_push($errors, ['companyMail' => 'Field cannot be blank']);
    }

    if (empty($data['companySite'])) {
        array_push($errors, ['companySite' => 'Field cannot be blank']);
    }

    if (empty($data['companyPhone'])) {
        array_push($errors, ['companyPhone' => 'Field cannot be blank']);
    }

    if (empty($data['payload']['customer'])) {
        array_push($errors, ['customer' => 'Field cannot be blank']);
    }
    
    if (empty($data['payload']['phone'])) {
        array_push($errors, ['phone' => 'Field cannot be blank']);
    }

    if (empty($data['payload']['time'])) {
        array_push($errors, ['time' => 'Field cannot be blank']);
    }

    return $errors;
}
