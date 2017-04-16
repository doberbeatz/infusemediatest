<?php

set_include_path(realpath(__DIR__ . '/') . PATH_SEPARATOR . get_include_path());

function autoload($className)
{
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require($className . '.php');
}

spl_autoload_register('autoload');