<?php

function validate($data) {
    $errors = [];

    if (empty($data['companyName'])) {
        $errors[] = ['companyName' => 'Field cannot be blank'];
    }

    if (empty($data['companyMail'])) {
        $errors[] = ['companyMail' => 'Field cannot be blank'];
    }

    if (empty($data['companySite'])) {
        $errors[] = ['companySite' => 'Field cannot be blank'];
    }

    if (empty($data['companyPhone'])) {
        $errors[] = ['companyPhone' => 'Field cannot be blank'];
    }

    if (empty($data['payload']['customer'])) {
        $errors[] = ['customer' => 'Field cannot be blank'];
    }
    
    if (empty($data['payload']['phone'])) {
        $errors[] = ['phone' => 'Field cannot be blank'];
    }

    if (empty($data['payload']['time'])) {
        $errors[] = ['time' => 'Field cannot be blank'];
    }

    return $errors;
}
