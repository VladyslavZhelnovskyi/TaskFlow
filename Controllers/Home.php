<?php

namespace Controllers;
use Core\Command;
use Core\Response;


class Home extends Command
{
    protected function doExecute(Response $response): void
    {
        include("Views/Home.php");
    }
}