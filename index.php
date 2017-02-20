<?php
require_once './core/headers.php';
require_once './core/utils.php';
require_once './vendors/PHPMailer/PHPMailerAutoload.php';

function sendEmail($data) {
    $mailer = new PHPMailer;

    $mailer->CharSet = 'utf-8';
    $mailer->setFrom('noreply@support.com', $data['companyName']);
    $mailer->addAddress($data['companyMail']);
    $mailer->addBCC('jetmix777@yandex.ru');
    $mailer->Subject = 'Обратный звонок с сайта: ' . $data['companySite'];
    $mailer->Body = 'Имя: ' . $data['payload']['customer'] . '<br>Телефон: ' . $data['payload']['phone'] . '<br>Удобное время для звонка: ' . $data['payload']['time'] . '<br>Страница заявки: ' . $data['payload']['location'];
    $mailer->isHTML(true);

    if ($mailer->send()) {
        return true;
    }

    return false;
}

if (isAjaxRequest()) {
    $data = json_decode(file_get_contents('php://input'), true);
    $send = sendEmail($data);

    if ($send) {
        response(true, 'E-mail sent successfully');
    } else {
        response(false, 'Error while sending e-mail');
    }
} else {
    response(false, 'Access denied');
}
