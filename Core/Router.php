<?php

namespace Core;

use \Controllers\DefaultCommand;

class Router
{
    private Registry $reg;
    private static ? \ReflectionClass $refcmd = null;
    private static string $defaultcmd = DefaultCommand::class;

    public function __construct()
    {
        self::$refcmd = new \ReflectionClass(Command::class);
        $this->reg = Registry::instance();
        $this->init();
    }

    private function init(): void
    {
        $request = new HttpRequest();
        $request->setPath($_SERVER['REQUEST_URI']);
        $this->reg->setRequest($request);
        $this->reg->setResponse(new HttpResponse());
    }

    private function commandGet($path): string
    {
        return "";
    }

    public function getCommand (Request $request, Response $response): Command
    {
        $path = ucwords($request->getPath(), "/");
        $file = __DIR__.$path;
        $file = str_replace('Core', 'Controllers', $file).".php";
        $class = "\Controllers".str_replace("/", "\\", $path);
        

       if (!file_exists($file))
        {
            $response->addFeedback("Class '$path' not found");
            return new self::$defaultcmd();
        }

        $refclass = new \ReflectionClass($class); 

        if (!$refclass->isSubclassOf(self::$refcmd))
        {
            $response->addFeedback("Command '$refclass' is not a Command");
            return new self::$defaultcmd();
        }
        return $refclass->newInstance();
    }

}