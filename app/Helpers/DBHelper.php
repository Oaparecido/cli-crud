<?php

namespace App\Helpers;

use App\database\Connection;
use Exception;
use PDO;

class DBHelper
{
    private static $pdo;

    /**
     * @throws Exception
     */
    private static function up()
    {
        try {
            self::$pdo = (new Connection())->connect();
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @param string $table
     * @param string $assignment
     * @return bool
     * @throws Exception
     */
    public static function create(string $table, string $assignment): bool
    {
        self::up();

        $sql = "CREATE TABLE IF NOT EXISTS $table (
                id integer primary key auto_increment,
                assignment varchar(100) not null 
                 )";

        try {
            self::$pdo->exec($sql);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }

        $sql = "INSERT INTO $table (1, :assignment)";
        return (self::$pdo->prepare($sql)->execute([$assignment])) ? true : false;
    }

    public static function delete(string $table, int $id)
    {
        self::up();

        $sql = "DROP";

    }

}
