<?php

namespace Core;


class FrontController
{
    private Registry $reg;

    private function __construct()
    {
        $this->reg = Registry::instance();
    }

    public static function run(): void
    {
        $instance = new self();
        $instance->handleRequest();
    }

    private function handleRequest(): void
    {
        $router = $this->reg->getRouter();
        $request = $this->reg->getRequest();
        $response = $this->reg->getResponse();

        if ($request->getHtttpMethod() == 'GET')
        {
            $cmd = $router->getCommand($request, $response);
        }


        $cmd->execute($response);
    }


}