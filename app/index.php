#!/usr/bin/env php
<?php

require_once 'vendor/autoload.php';

use App\Crud\Create;
use App\Crud\Delete;
use App\Crud\Read;
use App\Crud\Update;
use App\Helpers\ListCommandsHelper;

$options = [
    '--create', '-C',
    '--read', '-R',
    '--update', '-U',
    '--delete', '-D',
    '--list', '-L'
];

if (!isset($argv[1])) {
    echo "🚨 \e[91mIt's need passed a option\e[0m" . PHP_EOL;
    return;
}

switch ($argv[1]) {
    case '--create':
    case '-C':
        (new Create($argv));
        break;
    case '--read':
    case '-R':
        (new Update($argv));
        break;
    case '--update':
    case '-U':
        (new Read($argv));
        break;
    case '--delete':
    case '-D':
        (new Delete($argv));
        break;
    case '--list' :
    case '-L':
        (new ListCommandsHelper())->getMessage();
        break;
    default:
        echo "🚨 \e[91mOption invalid\e[0m" . PHP_EOL;
}