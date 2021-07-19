<?php

class IndexModel extends Model
{
    public function checkUser()
    {
        $login = $_POST['login'];
        $pass = md5($_POST['password']);
        $sql = "SELECT * FROM users WHERE login = :login AND pass= :pass";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":pass", $pass, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($res)) {
            if ($res['name'] == 'user') {
                $_SESSION['user'] = 'user 1';
                header("Location: /user");
            } elseif ($res['name'] == 'admin') {
                $_SESSION['user'] = 'user 2';
                header("Location: /admin");
            } else {
                echo "error";
                exit;
            }
        }else{
            return false;
        }
    }
    public function addUser()
    {
        $login = $_POST['login'];
        $pass = md5($_POST['password']);
        if($login == 'user 2' )
        {
            $name = 'admin';
        }else{
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