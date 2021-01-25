<?php

namespace App\database;

use App\Config;
use Exception;
use PDO;

class Connection
{

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return PDO
     * @throws Exception
     */
    public function connect() {
        try {
            $pdo = new PDO("sqlite:" . Config::PATH_SQLITE);
        } catch(Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }

        return $pdo;
    }
}