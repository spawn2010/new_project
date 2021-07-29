<?php

namespace Core;

use PDO;

class Model
{

    protected $db = null;

    public function __construct ()
    {
        $this->db = DB::connToDB();
    }

    public function insert ($key, $value, $data, $table)
    {
        $sql = "INSERT INTO `{$table}` ({$key}) VALUES ({$value})";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return true;
    }

    public function update ($param, $table)
    {
        foreach ($param as $key => $value) {
            foreach ($param[$key] as $key_2 => $value_2) {
                $param[$key] = $value_2;
            }
        }
        //не понимаю почему не работает если вместо problem подставить {$table}
        $sql = 'UPDATE problem SET rating = :rating WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($param);
    }

    public function get ($table, $data = [], $params = [])
    {
        $params = implode(' ', array_values($params));
        $sql = "SELECT * FROM {$table} {$params}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        if (!$params) {
            $res = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $res[$row['id']] = $row;
            }
        } else {
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $res;
    }
}


