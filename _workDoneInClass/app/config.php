<?php
/**
 * Created by PhpStorm.
 * User: gyula
 * Date: 11/12/2018
 * Time: 11:25 AM
 */

$lifetime=600;

ini_set("display_errors", 0);
ini_set("error_log", __DIR__."/../logs/error.log");

ini_set('session.cookie_httponly',1);
ini_set('session.use_only_cookies',1);
ini_set('cookie.session_id', 1);
//session_id(1);

session_set_cookie_params($lifetime);
session_start();

$config = [
  "env" => "dev",
];