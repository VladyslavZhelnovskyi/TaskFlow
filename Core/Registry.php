<?php

namespace Core;

class Registry
{
    private static ? Registry $instance = null;
    private ? Request $request = null;
    private ? Response $response = null;
    private ? Router $router = null;

    private function __construct()
    {
    }

    public static function instance(): self
    {
        if(is_null(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getRequest(): Request
    {
        if (is_null($this->request))
        {
            $this->request = new Request();
        }
        return $this->request;
    }

    public function getResponse(): Response
    {
        if (is_null($this->response))
        {
            $this->response = new Response();
        }
        return $this->response;
    }

    public function getRouter(): Router
    {
        if (is_null($this->router))
        {
            $this->router = new Router();
        }

        return $this->router;
    }

}