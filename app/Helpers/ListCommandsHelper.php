<?php

namespace App\Helpers;

class ListCommandsHelper
{
    private function listCreate() {
        echo " \e[93m📌 [--create|-C]\e[0m: creates an element in the database" . PHP_EOL;
        echo "     Usage:" . PHP_EOL;
        echo "     - First param: Name from database;" . PHP_EOL;
        echo "     - Second param: What wil be saved." . PHP_EOL;
        echo PHP_EOL;
    }

    private function listUpdate() {
        echo " \e[93m📌 [--update|-U]\e[0m: update an element in the database" . PHP_EOL;
        echo "     Usage:" . PHP_EOL;
        echo "     - First param: Name from database;" . PHP_EOL;
        echo "     - second param: id from element in the table;" . PHP_EOL;
        echo "     - Second param: What wil be saved." . PHP_EOL;
        echo PHP_EOL;
    }

    private function listDelete() {
        echo " \e[93m📌 [--delete|-D]\e[0m: delete an element in the database" . PHP_EOL;
        echo "     Usage:" . PHP_EOL;
        echo "     - First param: Name from database;" . PHP_EOL;
        echo "     - Second param: id from element in the table" . PHP_EOL;
        echo PHP_EOL;
    }

    private function listRead() {
        echo " \e[93m📌 [--read|-R]\e[0m: Read all elements and all tables" . PHP_EOL;
    }

    public function getMessage() {
        echo PHP_EOL;
        echo "🚀 \e[93mUsage options in cli-crud\e[0m 🚀" . PHP_EOL . PHP_EOL;
        $this->listCreate();
        $this->listDelete();
        $this->listUpdate();
        $this->listRead();
    }
}