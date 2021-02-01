<?php


namespace App\Helpers;


use Exception;

class ValidatorsHelper
{
    /**
     * @param $table
     * @param $ids
     * @return bool
     * @throws Exception
     */
    public static function verifyId($table, $ids): bool
    {
        $ids_exists = [];
        $content_table = DBHelper::read($table);

        foreach ($content_table as $contents) {
            foreach ($contents as $key => $value) {
                if ($key == 'id') {
                    $ids_exists[] = $value;
                }
            }
        }

        foreach ($ids as $id) {
            if (!in_array($id, $ids_exists)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param $argv
     * @return false
     */
    public static function verifyArgs($argv): bool
    {
        if (count($argv) < 4) {
            echo ResponseHelper::failed("see if you are passing the parameters correctly");
            return false;
        }

        return true;
    }
}