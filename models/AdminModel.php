<?php
class AdminModel extends Model
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
    public function addRating()
    {
        $id = key($_POST);
        $rating = $_POST[$id];
        $sql = "UPDATE problem SET rating = :rating WHERE id = :id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":rating", $rating, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }

    public function renderRating()
    {
        $sql = "SELECT * FROM problem  ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[$row['id']] = $row['rating'];
        }
        return $res;
    }
}

?>
