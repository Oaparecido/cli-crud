<?php

namespace App\Crud;

use App\Helpers\DBHelper;
use App\Helpers\ResponseHelper;
use Exception;

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
        $this->args['id'] = $argv[3];
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