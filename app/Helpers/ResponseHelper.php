<?php


namespace App\Helpers;


class ResponseHelper
{
    public static function success(bool $create): string
    {
        if ($create)
            return PHP_EOL . "  - ✅ \e[32mCongrats, assignment created!\e[0m" . PHP_EOL;
    }
}