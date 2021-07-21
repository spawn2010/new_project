<?php

class UserModel extends Model
{
    public function renderProblem()
    {
        $sql = "SELECT * FROM problem ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[$row['id']] = $row;
        }
        return $res;
    }

    public function addProblem($data)
    {
        $key = '`' . implode('`, `', array_keys($data)) . '`';
        $value   = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO `problem` ({$key}) VALUES ({$value})";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return true;
    }
}

?>