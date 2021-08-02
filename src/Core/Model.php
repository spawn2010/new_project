<?php

namespace app\Core;

use PDO;

class Model
{
    protected ?PDO $db = null;

    public function __construct ()
    {
        $this->db = DB::connToDB();
    }

    public function insert ($key, $value, $data, $table): bool
    {
        $sql = "INSERT INTO `{$table}` ({$key}) VALUES ({$value})";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return true;
    }

    public function update ($data, $table, $params): bool
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


