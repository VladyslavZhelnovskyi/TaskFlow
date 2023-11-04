<?php

namespace Core;

class Response
{
    protected int $statusCode;
    protected array $feedback = [];

    public function addFeedback(string $msg): void
    {
        array_push($this->feedback, $msg);
    }

    public function getFeedback(): array
    {
        return $this->feedback;
    }

    public function getFeedbackString($separator = "\n"): string
    {
        return implode($separator, $this->feedback);
    }

    public function clearFeedback(): void
    {
        $this->feedback = [];
    }

    public function setStatusCode(int $code): void 
    {
        http_response_code($code);
        $this->statusCode = http_response_code();
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}