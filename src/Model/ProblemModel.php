<?php

namespace src\Model;

use src\core\Model;
use PDO;

class ProblemModel extends Model
{

    public function getTable ()
    {
        $table = 'problem';
        return $this->get($table);
    }

    public function addRating ($data): void
    {
        $params['param_1'] = 'SET rating = :rating';
        $params['param_2'] = 'WHERE id = :id';
        $value['id'] = array_keys($data);
        $value['rating'] = array_values($data);
        $table = 'problem';
        $this->update($value, $table, $params);
    }

    public function addProblem ($data): void
    {
        $table = 'problem';
        $key = '`' . implode('`, `', array_keys($data)) . '`';
        $value = ':' . implode(', :', array_keys($data));
        $this->insert($key, $value, $data, $table);
    }
}

