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

        if (!empty($response)) {
            echo PHP_EOL;
            echo " ✨ " . $this->args['table_name'] . " ✨". PHP_EOL;
            $this->response($response);
        }
    }

    /**
     * @param array $response
     */
    private function response(array $response)
    {
        $new_array = [];
        foreach ($response as $response_array) {
            $new_array[$response_array['id']] = $response_array['assignment'];
        }

        foreach ($new_array as $id => $assignment) {
            echo "  \e[92m🔖:" . $id . "\e[0m => " . $assignment . PHP_EOL;
        }
    }
}