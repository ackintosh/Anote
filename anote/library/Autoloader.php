<?php
namespace Anote\Library;
/**
 * Class Loader
 * @package Library
 */

class Autoloader
{
    public function register($registFunction)
    {
        spl_autoload_register($registFunction);
    }

    public function load($className)
    {
        $paths = explode('\\', $className);
        $includeFile = ROOT . '/' . implode('/', $paths) . '.php';

        if (is_readable($includeFile)) {
            require_once($includeFile);
        }
    }
}
