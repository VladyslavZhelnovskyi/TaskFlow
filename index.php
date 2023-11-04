<?php
    require_once ("autoload.php");

    ini_set("display_errors", 1);
    error_reporting(E_ALL);

    Core\FrontController::run();