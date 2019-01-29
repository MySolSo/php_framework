<?php
require __DIR__ . '/../vendor/autoload.php';
require_once '../app/routes.php';

use Tracy\Debugger;

ini_set("display_errors", 0);
ini_set("error_log", __DIR__ . "/../logs/error.log");

if(\App\Config::ENV === 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    Debugger::enable(Debugger::DEVELOPMENT);
}

//var_dump helper functions
//bd-> dump in the debugging bar
function bd($data) {
    bdump($data);
}
//dd-> dump on the page and die
function dd($data) {
    dump($data);
    die();
}

session_start();
$router = new Framework\Router($routes);
$router->getResource($_SERVER['REQUEST_URI']);
