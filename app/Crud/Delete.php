<?php


namespace App\Crud;


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
        $this->args['assignment'] = $argv[3];
    }

    public function handle()
    {
        
    }
}