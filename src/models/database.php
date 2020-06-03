<?php
 
namespace Models; 
use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Dotenv\Dotenv;

class Database {
 
    function __construct() {
        $dotenv = new Dotenv();
        $dotenv->loadEnv(__DIR__."/../../.env");
        $capsule = new Capsule;
        //TODO não funcionou o getenv...
        // echo "getenv = ".getenv("DB_CONNECTION");
        $capsule->addConnection([
        // "driver" => getenv("DB_CONNECTION", "mysql"),
        // "host" => getenv("DB_HOST", "coopercard_db"),
        // "database" => getenv("DB_DATABASE", "coopercard"),
        // "username" => getenv("DB_USERNAME", "root"),
        // "password" => getenv("DB_PASSWORD", "coopercard"),
        "driver" => "mysql",
        "host" => "coopercard_db",
        "database" => "coopercard",
        "username" => "root",
        "password" => "coopercard",
        "charset" => "utf8",
        "collation" => "utf8_unicode_ci",
        "prefix" => "",
        ]);
        // Setup the Eloquent ORM… 
        $capsule->bootEloquent();
    }
 
}
