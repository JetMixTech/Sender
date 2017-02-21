<?php
require_once './core/headers.php';
require_once './core/utils.php';
require_once './core/validate.php';
require_once './core/sender.php';
require_once './vendors/PHPMailer/PHPMailerAutoload.php';

if (isAjaxRequest()) {
    $data = json_decode(file_get_contents('php://input'), true);
    $errors = validate($data);

    if (count($errors)) {
        response([
            'success' => false,
            'code' => 400,
            'errors' => $errors,
            'message' => 'Fields cannot be blank'
        ]);
    } else {
        $send = sendEmail($data);

        if ($send) {
            response([
                'success' => true,
                'code' => 200,
                'message' => 'Email sent successfully'
            ]);
        } else {
            response([
                'success' => false,
                'code' => 500,
                'message' => 'Failure when sending email'
            ]);
        }
    }
} else {
    response([
        'success' => false,
        'code' => 405,
        'message' => 'Only for POST request'
    ]);
}
