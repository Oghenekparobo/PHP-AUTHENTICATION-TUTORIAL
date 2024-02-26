<?php
require dirname(__DIR__)  . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

set_error_handler('ErrorHandler::handleError');
set_exception_handler('ErrorHandler::handleException');



header("Content-type: application/json; charset=UTF-8");

echo $_ENV["DB_HOST"] . " ";
echo $_ENV["DB_NAME"] . " ";
echo $_ENV["DB_USER"] . " ";
echo $_ENV["DB_PASS"];