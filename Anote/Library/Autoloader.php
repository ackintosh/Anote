<?php
namespace Anote\Library;
/**
 * Class Loader
 * @package Library
 */

class Autoloader
{
    private $rootPath;

    public function setRootPath($path)
    {
        $this->rootPath = $path;
        return $this;
    }

    public function register($registFunction)
    {
        spl_autoload_register($registFunction);
    }

    public function load($className)
    {
        $paths = explode('\\', $className);
        $includeFile = $this->rootPath . '/' . implode('/', $paths) . '.php';

        if (is_readable($includeFile)) {
            require_once($includeFile);
        }
    }
}
