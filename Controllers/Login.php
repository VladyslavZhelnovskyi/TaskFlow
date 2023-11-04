<?php

namespace Controllers;
use Core\Command;
use Core\Response;

class Login extends Command
{
    protected function doExecute(Response $response): void
    {
        require_once("Views/Login.php");
    }
}