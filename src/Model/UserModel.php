<?php

namespace app\Model;

use app\Core\Model;
use Doctrine\DBAL\Exception;

class UserModel extends Model
{
    public static function tableName(): string
    {
        return 'users';
    }

    /**
     * @throws Exception
     */
    public function get($login, $pass)
    {
        $queryBuilder = $this->db2->createQueryBuilder();
        $res = $queryBuilder
            ->select('*')
            ->from('users')
            ->where('login = ?')
            ->andWhere('pass = ?')
            ->setParameter(0, $login)
            ->setParameter(1, $pass);
        $res = $res->fetchAssociative();
        return ($res);
    }

    /**
     * @throws Exception
     */
    public function addUser($data): void
    {
        $data['pass'] = md5($data['pass']);
        $this->insert(self::tableName(), $data);
    }
}