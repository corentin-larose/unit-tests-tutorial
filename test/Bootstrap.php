<?php
namespace CL\UnitTestingTutorialTest;

error_reporting(-1);
chdir(__DIR__);

class Bootstrap
{
    public static function init()
    {
        require '../vendor/autoload.php';
    }
}

Bootstrap::init();
