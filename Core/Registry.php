<?php

namespace Core;

use Request;

class Registry
{
    private static ? Registry $instance = null;
    private ? Request $request = null;
    private ? ApplicationHelper $applicationHelper = null;
    private ? Conf $conf = null;
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

    public function setRequest(\Request $request): void
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        if(is_null($this->request))
        {
            throw new \Exception("Request doesn't set");
        }
        return $this->request;
    }

    public function getApplicationHelper(): ApplicationHelper
    {
        if (is_null($this->applicationHelper))
        {
            $this->applicationHelper = new ApplicationHelper();
        }

        return $this->applicationHelper;
    }

    public function setConf(Conf $conf): void
    {
        $this->conf = $conf;
    }

    public function getConf(): Conf
    {
        if (is_null($this->conf))
        {
            $this->conf = new Conf();
        }

        return $this->conf;
    }

    public function setCommands(Conf $commands): void
    {
        $this->commands = $commands;
    }

    public function getCommands(): Conf
    {
        if (is_null($this->commands))
        {
            $this->commands = new Conf();
        }

        return $this->commands;
    }
}