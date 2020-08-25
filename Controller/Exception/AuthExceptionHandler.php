<?php


namespace Controller\Exception;


class AuthExceptionHandler
{
    public function handleException($exception)
    {
        error_log("<b>Exception:</b> ". $exception->getMessage(), 0);

        header('Content-type: application/json');

        $response['status'] = 500;
        $response['message'] = "oOops , something is wrong, please try later <3 ";

        http_response_code(500);
        echo json_encode($response);
    }
}