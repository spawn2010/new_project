<?php

class Model
{
    protected $db = null;

    public function __construct()
    {
        $this->db = DB::connToDB();
    }

    public function getUser($login, $pass)
    {
        $sql = "SELECT * FROM users WHERE login = :login AND pass= :pass";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":pass", $pass, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($res);
    }
}