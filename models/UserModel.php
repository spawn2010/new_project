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

    public function addProblem()
    {
        $problem = $_POST['problem'];
        $decision = $_POST['decision'];
        $sql = "INSERT INTO problem (problem, decision) VALUES (:problem, :decision)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":problem", $problem, PDO::PARAM_STR);
        $stmt->bindValue(":decision", $decision, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }
}

?>