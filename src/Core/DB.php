<?php

namespace app\Core;

use Doctrine\DBAL\Exception;

class DB
{
    /**
     * @throws Exception
     */
    public static function connToDB(): \Doctrine\DBAL\Connection
    {
        $connectionParams = array(
            'dbname' => 'register-bd',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );
        return \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
    }
}