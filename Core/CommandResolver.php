<?php

namespace Core;

use MongoDB\Driver\Command;

class CommandResolver
{
    private static ? \ReflectionClass $refcmd = null;
    private static string $defaultcmd = DefaultCommand::class;

    public function getCommand (Request $request): Command
    {
        $reg = Registry::instance();
        $commands = $reg->getCommands();
        $path = $request->getPath();
        $class = $commands->get($path);

        if (is_null($class))
        {
            $request->addFeedback("Path '$path' is not good");
            return new self::$defaultcmd();
        }

        if (!class_exists($class))
        {
            $request->addFeedback("Class '$class' not found");
            return new self::$defaultcmd();
        }

        $refclass = new \ReflectionClass($class);

        if (!$refclass->isSubclassOf(self::$refcmd));
        {
            $request->addFeedback("Command '$refclass' is not a Command");
            return new self::$defaultcmd();
        }
        return $refclass->newInstance();
    }
}