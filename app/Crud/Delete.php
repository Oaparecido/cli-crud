<?php

namespace App\Crud;

use App\Helpers\DBHelper;
use App\Helpers\ResponseHelper;
use Exception;
use function Couchbase\defaultDecoder;

class Delete
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
        if (count($argv) > 3) {
            for ($i = 3; $i <= count($argv); $i++) {
                var_dump($argv[$i]);
                die();
            }
            $this->args['id'] = $argv[$i];
        }
    }

    /**
     * @throws Exception
     */
    public function handle()
    {
        if (DBHelper::delete($this->args['table_name'], $this->args['id']))
            echo ResponseHelper::success(delete: true);
    }
}