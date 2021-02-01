<?php

namespace App\Crud;

use App\Helpers\DBHelper;
use Exception;

class Read
{
    /**
     * @var array
     */
    private array $args = [];

    /**
     * Create constructor.
     * @param array $argv
     */
    public function __construct(array $argv)
    {
        $this->args['table_name'] = $argv[2];
    }

    /**
     * @throws Exception
     */
    public function handle()
    {
        $response = DBHelper::read($this->args['table_name']);

        echo PHP_EOL;
        echo " ✨ " . $this->args['table_name'] . " ✨". PHP_EOL;

        if (!empty($response) && $this->args['table_name'] !== 'Databases') {
            $this->response($response);
        } else {
            $this->response($response, true);
        }
    }

    /**
     * @param array $response
     * @param bool $all
     */
    private function response(array $response, $all = false)
    {
        if ($all) {
            foreach ($response as $table) {
                echo "  \e[92m🔖:" . $table[0] . "\e[0m" . PHP_EOL;
            }
            return;
        }

        $new_array = [];
        foreach ($response as $response_array) {
            $new_array[$response_array['id']] = $response_array['assignment'];
        }

        foreach ($new_array as $id => $assignment) {
            echo "  \e[92m🔖:" . $id . "\e[0m => " . $assignment . PHP_EOL;
        }
    }
}