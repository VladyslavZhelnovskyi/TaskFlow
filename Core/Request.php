<?php

namespace Core;

abstract class Request
{
    protected array $properties = [];
    protected string $path = "/";

    public function setPath (string $path): void
    {
        $this->path = $path;
    }

    public function getPath (): string
    {
        return $this->path;
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

}