<?php


namespace App\Crud;


use App\Helpers\DBHelper;
use Exception;

class Create
{
    private $args = [];
    public function __construct(array $argv)
    {
        $this->args['table_name'] = $argv[2];
        $this->args['assignment'] = $argv[3];
    }

    /**
     * @throws Exception
     */
    public function store()
    {
        DBHelper::create($this->args['table_name'], $this->args['assignment']);
    }
}