<?php

namespace Model;

use core\Model;
use PDO;

// все параметры которые я здесь определяю и передаю функциям Core/Model должны быть здесь или же они должны определяться
// в контроллере и передаваться сюда ?
class ProblemModel extends Model
{

    public function getTable ()
    {
        $table = 'problem';
        return $this->get($table);
    }

    public function addRating ($data)
    {
        var_dump($data);
        $param['id'] = array_keys($data);
        $param['rating'] = array_values($data);
        $table = 'problem';
        $this->update($param, $table);
    }

    public function addProblem ($data)
    {
        $table = 'problem';
        $key = '`' . implode('`, `', array_keys($data)) . '`';
        $value = ':' . implode(', :', array_keys($data));
        $this->insert($key, $value, $data, $table);
    }
}

