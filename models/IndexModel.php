<?php

class IndexModel extends Model
    {
    public function checkUser($login, $pass)
        {
        $res = $this->getUser($login, $pass);
        if (!empty($res))
            {
            if ($res['name'] == 'user')
                {
                $_SESSION['user'] = 'user 1';
                } elseif ($res['name'] == 'admin')
                {
                $_SESSION['user'] = 'user 2';
                }
            } else
            {
            return isset($res);
            }
        }

    public function addUser($login, $pass)
        {
        if ($login == 'user 2')
            {
            $name = 'admin';
            } else
            {
            $name = 'user';
            }
        $sql = "INSERT INTO users (login, pass, name) VALUES (:login, :pass, :name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":pass", $pass, PDO::PARAM_STR);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        return true;
        }
    }