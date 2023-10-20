<?php


namespace Core;


abstract class Command
{
    final public function __construct ()
    {

    }

    public function execute (Request $request): void
    {
        $this->doExecute($request);
    }

    abstract protected function doExecute (Request $request): void;
}