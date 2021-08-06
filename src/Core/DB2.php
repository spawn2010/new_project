<?php

namespace app\Core;

use Doctrine\DBAL\Exception;

class DB2
{
    /**
     * @throws Exception
     */
    public static function connToDB2(): \Doctrine\DBAL\Connection
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