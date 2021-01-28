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
    public function connect(): PDO
    {
        try {
            $pdo = new PDO("mysql:host=" . Config::MYSQL_HOST . ";dbname=" . Config::MYSQL_DATABASE . ";port=" . Config::MYSQL_PORT, Config::MYSQL_USER, Config::MYSQL_PASSWORD);
        } catch(Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }

        return $pdo;
    }
}