<?php
 
 namespace Core;

class HttpRequest extends Request
{
    private ? int $statusCode = null;
    private ? string $httpMethod = null;

    public function setStatusCode(int $code): void
    {
        $this->statusCode = $code;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
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