<?php
/**
 * Created by PhpStorm.
 * User: gyula
 * Date: 11/19/2018
 * Time: 11:13 AM
 */

class Router {
//    public function __construct($param, $otherParam) {
//        // idk
//    }

    public function redirrect($url, $query_str)
    {
//        var_dump($url);
//        var_dump($query_str);
        header("Location: http://localhost:8012/framework/app/Controllers/" . $url . ".php?" . $query_str);
    }

    public function loadController($name) {
        require_once __DIR__ . "\..\app\Controllers\\" . $name . ".php";
    }

    public function loadModule() {
        return "asd";
    }

    public function loadView(){
        return "asd";
    }
}