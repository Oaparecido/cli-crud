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
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(':assignment', $assignment);
        return $stmt->execute();
    }

    /**
     * @param string $table
     * @param $ids
     * @return mixed
     * @throws Exception
     */
    public static function delete(string $table, array $ids): bool
    {
        self::up();
        /**
         * TODO: Add logic to delete multiples $id
         * guru99.com/delete-and-update.html
         */

        foreach ($ids as $id) {
            $sql = "DELETE FROM $table WHERE id = $id";
            $stmt = self::$pdo->prepare($sql);
            try {
                $stmt->execute();
            } catch (Exception $exception) {
                throw new Exception($exception->getMessage(), $exception->getCode());
            }
        }

        return true;
    }

    /**
     * @param string $table
     * @return array
     * @throws Exception
     */
    public static function read(string $table): array
    {
        self::up();

        $sql = "SELECT * FROM $table";
        $stmt = self::$pdo->query($sql);
        return $stmt->fetchAll();
    }

    public static function testConnection()
    {
        self::up();

        if (self::$pdo != null) {
            for ($i = 0; $i < 5; $i++) {
                sleep(1.5);
                echo ". ";
            }
            echo PHP_EOL;
            echo "✅ \e[92mConnected to the SQLite database successfully!\e[0m" . PHP_EOL . PHP_EOL;
            sleep(2);
        } else {

            echo "🚨 \e[91mWhoops, could not connect to the SQLite database!\e[0m" . PHP_EOL . PHP_EOL;
        }
    }

}
