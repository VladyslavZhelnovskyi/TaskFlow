<?php

namespace Core;

class Request
{
    protected string $path = "/";
    protected array $properties = [];
    private ? string $httpMethod = null;
    protected string $file = ""; 

    public function __construct()
    {
        $this->path = ucwords($_SERVER['REQUEST_URI'], "/");
        $this->file = str_replace('Core', 'Controllers', __DIR__.$this->path).".php";
        $this->setHttpMethod($_SERVER['REQUEST_METHOD']);
    }

    public function setPath (string $path): void
    {
        $this->path = $path;
    }

    public function getPath (): string
    {
        return $this->path;
    }

    public function getFile(): string 
    {
        return $this->file;
    }

    public function getProperty (string $key): mixed
    {
        if (isset($this->properties[$key]))
        {
            return $this->properties[$key];
        }

        return null;
    }

    public function setProperty(string $key, mixed $val): void
    {
        $this->properties[$key] = $val;
    }

    public function setHttpMethod(string $method): void
    {
        $this->httpMethod = $method;
    }

    public function getHtttpMethod(): string
    {
        return $this->httpMethod;
    }

}