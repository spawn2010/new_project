<?php

class ProblemModel extends Model
    {
    public function getProblem()
        {
        $sql = "SELECT * FROM problem ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
            $res[$row['id']] = $row;
            }
        return $res;
        }

    public function addRating($data)
        {
        foreach ($data as $key => $value)
            {
            $id = $key;
            $rating = $value;
            $sql = "UPDATE problem SET rating = :rating WHERE id = :id ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->bindValue(":rating", $rating, PDO::PARAM_STR);
            $stmt->execute();
            }
        }

    public function getRating()
        {
        $sql = "SELECT * FROM problem  ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
            $res[$row['id']] = $row['rating'];
            }
        return $res;
        }

    public function addProblem($data)
        {
        $key = '`' . implode('`, `', array_keys($data)) . '`';
        $value = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO `problem` ({$key}) VALUES ({$value})";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return true;
        }
    }

