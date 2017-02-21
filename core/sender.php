<?php

/**
 * Get subject for email
 * @var $data (array) - data
 * @return (string) - subject
 */
function getSubject($data) {
    $subject = vsprintf('Обратный звонок с сайта: %s', [
        'companySite' => $data['companySite']
    ]);

    return $subject;
}

/**
 * Get body for email
 * @var $data (array) - data
 * @return (string) - body
 */
function getEmailBody($data) {
    $body = vsprintf('Имя: %s<br>Телефон: %s<br>Удобное время для звонка: %s<br>Страница заявки: %s', [
        'customer' => $data['payload']['customer'],
        'phone' => $data['payload']['phone'],
        'time' => $data['payload']['time'],
        'location' => $data['payload']['location']
    ]);

    return $body;
}

function sendEmail($data) {
    $mailer = new PHPMailer;

    $mailer->CharSet = 'utf-8';
    $mailer->setFrom('noreply@support.com', $data['companyName']);
    $mailer->addAddress($data['companyMail']);
    $mailer->addBCC('jetmix777@yandex.ru');
    $mailer->Subject = getSubject($data);
    $mailer->Body = getEmailBody($data);
    $mailer->isHTML(true);

    if ($mailer->send()) {
        return true;
    }

    return false;
}
