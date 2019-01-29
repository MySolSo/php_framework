<?php
namespace App;

class Config
{
    const ENV = "dev";
    const HEAD_VARIABLES = "on";
    const DB = [
        "driver"  => "mysql",
        'host'    => 'localhost',
        'dbname'  => 'my_youtube',
        'port'    => '3306',
        'charset' => 'utf8mb4',
        'user'    => 'root',
        'pass'    => ''
    ];
}
