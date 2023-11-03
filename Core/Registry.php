<?php

namespace Core;

class Registry
{
    private static ? Registry $instance = null;
    private ? Request $request = null;
    private ? Response $response = null;
    private ? Router $router = null;
    private ? Command $commands = null;

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

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        if (is_null($this->request))
        {
            throw new \Exception("Request doesn't set");
        }
        return $this->request;
    }

    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }

    public function getResponse(): Response
    {
        if (is_null($this->request))
        {
            throw new \Exception("Response doesn't set");
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