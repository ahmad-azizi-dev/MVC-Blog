<?php

namespace App\Core;

use PDO;

abstract class BaseModel
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = AppContainer::make(DbConnection::Class)->getConnection();
    }


    public function query(string $query, array $params = null, $mode = PDO::FETCH_ASSOC)
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);

        return $statement->fetchAll($mode);
    }

}