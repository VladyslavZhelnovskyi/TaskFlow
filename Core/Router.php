<?php

namespace Core;

class Router
{
    private static ? \ReflectionClass $refcmd = null;

    public function __construct()
    {
        self::$refcmd = new \ReflectionClass(Command::class);
    }

    public function getCommand (Request $request, Response $response): Command
    {        
        $class = "\Controllers".str_replace("/", "\\", $request->getPath());
        $file = $request->getFile();

        if ($request->getPath() == "/")
        {
            $response->setStatusCode(200);
            return new \Controllers\Home();
        }
       
        if (!file_exists($file))
        {
            $response->setStatusCode(404);
            $response->addFeedback("File '$file' not found");
            return new \Controllers\NotFound();
        }
        
        $refclass = new \ReflectionClass($class); 

        if (!$refclass->isSubclassOf(self::$refcmd))
        {
            $response->setStatusCode(404);
            $response->addFeedback("Command '$refclass' is not a Command");
            return new \Controllers\NotFound();
        }

        $response->setStatusCode(200);
        return $refclass->newInstance();
    }

}