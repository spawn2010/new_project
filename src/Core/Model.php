<?php

namespace src\Core;

use PDO;

class Model
{

    protected ?PDO $db = null;

    public function __construct()
    {
        $this->db = DB::connToDB();
    }

<<<<<<< HEAD:src/core/Model.php
    public function insert ($key, $value, $data, $table): bool
=======
    public function insert($key, $value, $data, $table)
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80:src/Core/Model.php
    {
        $sql = "INSERT INTO `{$table}` ({$key}) VALUES ({$value})";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return true;
    }

<<<<<<< HEAD:src/core/Model.php
    public function update ($data, $table, $params): bool
=======
    public function update($param, $table)
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80:src/Core/Model.php
    {
        $params = implode(' ', array_values($params));
        foreach ($data as $key => $value) {
            foreach ($value as $key_2 => $value_2) {
                $data[$key] = $value_2;
            }
        }
        $sql = "UPDATE {$table} {$params}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return true;
    }

    public function get($table, $data = [], $params = [])
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


