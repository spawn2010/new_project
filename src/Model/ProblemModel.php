<?php

namespace src\Model;

use src\core\Model;
use PDO;

class ProblemModel extends Model
{

    public function getTable()
    {
        $table = 'problem';
        return $this->get($table);
    }

<<<<<<< HEAD
    public function addRating ($data): void
    {
        $params['param_1'] = 'SET rating = :rating';
        $params['param_2'] = 'WHERE id = :id';
        $value['id'] = array_keys($data);
        $value['rating'] = array_values($data);
=======
    public function addRating($data)
    {
        $param['id'] = array_keys($data);
        $param['rating'] = array_values($data);
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80
        $table = 'problem';
        $this->update($value, $table, $params);
    }

<<<<<<< HEAD
    public function addProblem ($data): void
=======
    public function addProblem($data)
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80
    {
        $table = 'problem';
        $key = '`' . implode('`, `', array_keys($data)) . '`';
        $value = ':' . implode(', :', array_keys($data));
        $this->insert($key, $value, $data, $table);
    }
}

