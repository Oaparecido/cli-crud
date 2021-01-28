<?php


namespace App\Crud;


use App\Helpers\DBHelper;
use App\Helpers\ResponseHelper;
use Exception;

class Create
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
        $this->args['assignment'] = $argv[3];
    }

    /**
     * @throws Exception
     */
    public function handle()
    {
        //TODO: Add validations in args, to clean names
        if (DBHelper::create($this->args['table_name'], $this->args['assignment']))
            echo ResponseHelper::success(create: true);
    }
}