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
 * @var $response (array) - response data
 */
function response($response) {
    // Set response code
    $responseCode = isset($response['code']) ? $response['code'] : 200;
    http_response_code($responseCode);
    // Conver to JSON
    $response = json_encode($response, JSON_UNESCAPED_UNICODE);
    exit($response);
}
