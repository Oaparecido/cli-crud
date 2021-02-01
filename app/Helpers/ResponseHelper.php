<?php


namespace App\Helpers;


class ResponseHelper
{
    /**
     * @param bool $create
     * @param bool $delete
     * @param bool $read
     * @return string
     */
    public static function success(bool $create = false, bool $delete = false, bool $read = false): string
    {
        if ($create)
            return PHP_EOL . "   ✅ \e[32mCreated!\e[0m" . PHP_EOL;
        if ($delete)
            return PHP_EOL . "   ✅ \e[32mDeleted!\e[0m" . PHP_EOL;
    }

    /**
     * @param bool $create
     * @param bool $delete
     * @param bool $read
     * @return string
     */
    public static function failed(bool $create = false, bool $delete = false, bool $read = false): string
    {
        if ($delete)
            return PHP_EOL . "   🚨 \e[31mNot deleted, look id and name table.\e[0m" . PHP_EOL;
    }
}