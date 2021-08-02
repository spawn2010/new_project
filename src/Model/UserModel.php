<?php

namespace app\Model;

use app\core\Model;
use PDO;

class UserModel extends Model
{

    public function checkUser ($login, $pass)
    {
        $table = 'users';
        $data['login'] = $login;
        $data['pass'] = $pass;
        $params['param_1'] = 'WHERE login = :login';
        $params['param_2'] = 'AND pass = :pass';
        $res = $this->get($table, $data, $params);
        return ($res);
    }

    public function addUser ($login, $pass): void
    {
        $data = [
            'login' => (string)$login,
            'pass' => (string)$pass
        ];
        if ($login === 'user 2') {
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