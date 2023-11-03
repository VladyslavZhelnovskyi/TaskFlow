<?php


namespace Core;


abstract class Command
{
    final public function __construct ()
    {

    }

    public function execute (Response $response): void
    {
        $this->doExecute($response);
    }

    abstract protected function doExecute (Response $response): void;
}