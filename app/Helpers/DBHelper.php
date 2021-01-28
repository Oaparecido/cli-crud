<?php

namespace App\Helpers;

use App\database\Connection;
use Exception;

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

        $sql = "INSERT INTO $table (assignment) VALUES (:assignment)";
        $stmt =  self::$pdo->prepare($sql);
        $stmt->bindParam(':assignment', $assignment);
        $stmt->execute();
        return true;
//        return self::$pdo->prepare($sql)->bindParam(':assignment', $assignment)->execute();
    }

    public static function delete(string $table, int $id)
    {
        self::up();

        $sql = "DROP";

    }

}
