<?php

namespace Controllers;
use Core\Command;
use Core\Response;

class NotFound extends Command
{
    protected function doExecute (Response $response): void
    {
        require_once('Views/NotFound.php');
    }
}