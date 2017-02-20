<?php
/**
 * Check if the request was an ajax request
 * @return boolean True, the request was an ajax request; otherwise, false
 */
function isAjaxRequest() {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

/**
 * Response for AJAX request
 * @var $success (boolean) true - if success response, false - if error response
 * @var $message (string) - message for response
 * @var $payload (any) - payload for response
 */
function response($success, $message = '', $payload = null) {
    $response = [
        'success' => $success,
        'message' => $message
    ];

    if (isset($payload)) {
        $response = array_merge($response, $payload);
    }

    exit(json_encode($response));
}
