<?php


define("__ROOT__", dirname(__DIR__));


require_once __ROOT__ . '/vendor/autoload.php';

session_start();

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('App\Core\Error::errorHandler');
set_exception_handler('APP\Core\Error::exceptionHandler');