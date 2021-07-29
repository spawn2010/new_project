<?php

namespace Model;

use core\Model;
use PDO;

class IndexModel extends Model
{

    public function checkUser($login, $pass)
    {
        $table = 'users';
        $data['login'] = $login;
        $data['pass'] = $pass;
        $params['param_1'] = 'WHERE login = :login';
        $params['param_2'] = 'AND pass = :pass';
        $res = $this->get($table, $data, $params);
        return ($res);
    }

    public function addUser($login, $pass)
    {
        $data = [
            'login' => "$login",
            'pass' => "$pass"
        ];
        if ($login == 'user 2') {
            $data['name'] = 'admin';
        } else {
            $data['name'] = 'user';
        }
        $table = 'users';
        array_pop($_POST);
        $_POST['name'] = 'name';
        $key = '`' . implode('`, `', array_keys($_POST)) . '`';
        $value = ':' . implode(', :', array_keys($_POST));
        $this->insert($key, $value, $data, $table);
    }
}