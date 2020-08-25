<?php
function showJsonResponse($code, $message)
{
    header('Content-type: application/json');

    $response['status'] = $code;
    $response['message'] = $message;

    http_response_code($code);
    echo json_encode($response);
}