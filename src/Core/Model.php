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
    public function insert($table, $data): void
    {
        $values = (array_values($data));
        foreach ($data as $key => $params) {
            $keys[$key] = '?';
        }
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->insert((string)$table)
            ->values(
                $keys
            )
            ->setParameters(
                $values
            )
            ->executeQuery();
    }

    /**
     * @throws Exception
     */
    public function update($id, $rating): void
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


