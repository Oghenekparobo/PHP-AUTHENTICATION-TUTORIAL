<?php
require __DIR__ . '/bootstrap.php';


$user = new User($database);

$auth = new Authenticate($user);

if (!$auth->authenticateAccessToken()) {
    exit;
}

$gateway = new Gateway($database);

$controller = new Controller($gateway);



$controller->processRequest($_SERVER['REQUEST_METHOD']);
