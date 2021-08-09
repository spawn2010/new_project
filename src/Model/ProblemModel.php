<?php

namespace app\Model;

use app\Core\Model;
use Doctrine\DBAL\Exception;

class ProblemModel extends Model
{
    public static function tableName(): string
    {
        return 'problem';
    }

    /**
     * @throws Exception
     */
    public function addRating($data): void
    {
        $id = (key($data));
        $rating = (($data[$id]));
        $this->update($id, $rating);
    }

    /**
     * @throws Exception
     */
    public function addProblem($data): void
    {
        $this->insert(self::tableName(), $data);
    }
}

