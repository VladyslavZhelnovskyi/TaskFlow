<?php

namespace Controllers;
use Core\Command;
use Core\Response;

class Login extends Command
{
    protected function doExecute(Response $response): void
    {
        require_once(__DIR__."/../Views/Login.php");
    }
}