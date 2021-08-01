<?php

namespace src\Core;

use PDO;

class DB
{
    public const USER = "root";
    public const PASS = '';
    public const HOST = "localhost";
    public const DB = "register-bd";

    public static function connToDB (): PDO
    {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;
        return new PDO("mysql:dbname=$db;host=$host", $user, $pass);
    }
}
