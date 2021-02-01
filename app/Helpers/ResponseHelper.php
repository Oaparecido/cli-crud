<?php


namespace App\Helpers;


class ResponseHelper
{
    /**
     * @param string $message
     * @return string
     */
    public static function success(string $message): string
    {
        return PHP_EOL . "   ✅ \e[32mYour assignment was $message\e[0m" . PHP_EOL;
    }

    /**
     * @param string $message
     * @return string
     */
    public static function failed(string $message): string
    {
            return PHP_EOL . "   🚨 \e[31mSomething went wrong, $message\e[0m" . PHP_EOL;
    }
}