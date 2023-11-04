<?php

namespace Controllers;
use Core\Command;
use Core\Response;

class Tasks extends Command
{
    protected function doExecute(Response $response): void
    {
        require_once("Views/Tasks.php");
    }
}