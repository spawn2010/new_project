<?php

namespace app\Core;

use Doctrine\DBAL\Exception;

class Model
{
    protected ?\Doctrine\DBAL\Connection $db = null;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->db = DB::connToDB();
    }

    /**
     * @throws Exception
     */
    public function insert($table, $array): void
    {
        $value = (array_values($array));
        foreach ($array as $key => $params) {
            $array[$key] = '?';
        }
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->insert((string)$table)
            ->values(
                $array
            )
            ->setParameters(
                $value
            )
            ->executeQuery();
    }

    /**
     * @throws Exception
     */
    public function update2($id, $rating): void
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder->update('problem')
            ->set('rating', (string)$rating)
            ->where("id = $id")
            ->executeQuery();
    }

    /**
     * @throws Exception
     */
    public function getAll($table, $params = ["*"]): array
    {
        $params = implode(' ', array_values($params));
        $queryBuilder = $this->db->createQueryBuilder();
        $res = $queryBuilder
            ->select((string)($params))
            ->from((string)($table));
        return ($res->fetchAllAssociative());
    }
}


