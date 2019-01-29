<?php
/**
 * Created by PhpStorm.
 * User: gyula
 * Date: 11/19/2018
 * Time: 11:41 AM
 */

$route = [
    "/page/about-us" => [
        "controller" => "PageController",
        "action" => "aboutUsAction"
    ],
    "/user/{id}" => [
        "controller" => "UserController",
        "action" => "showAction"
    ],
    [
        "controller" => "Login",
        "action" => "showLogin"
    ]
];