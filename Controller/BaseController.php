<?php


namespace Controller;

use Controller\Exception\AuthExceptionHandler;

class BaseController extends AuthExceptionHandler
{
    function __construct()
    {
        set_exception_handler(array($this, "handleException"));
    }
}