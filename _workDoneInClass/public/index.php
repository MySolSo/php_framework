<?php
/**
 * Created by PhpStorm.
 * User: gyula
 * Date: 11/12/2018
 * Time: 10:43 AM
 */

require_once "../app/config.php";
require_once "../src/Router.php";

$router = new Router();

if ($config["env"] == "dev")
{
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
}

if (isset($_SESSION["username"])) {
    print("You are in this session " . $_SESSION["username"] . "<br>");
    include_once "confidential.php";
} else {
    print("You are not logged in <br>");
    $router->loadController("Login")->index();
    //new Login();
}
////////////////
/// class Router shoul use routes.php to redirrect data and trafic

$url = $_SERVER["REQUEST_URI"];
$query_str = $_SERVER["QUERY_STRING"];
//print($router->handle($url, $query_str));