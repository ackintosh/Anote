<?php
namespace Anote\Library;
use Anote\Library\Reflection;
use Anote\Library\AnotationParser;
use Anote\Library\Route;
use Anote\Library\Exception\RouteNotFoundException;

class RoutingTable
{
    private $core;
    private $routes = array();

    public function __construct(\Anote\AnoteCore $core)
    {
        $this->core = $core;
        $this->build();
    }

    private function build()
    {
        foreach (Reflection::getMethods($this->core) as $m) {
            $anoteUrl = AnotationParser::anoteURL(Reflection::getMethodComment($this->core, $m->name));
            if ($anoteUrl) {
                $this->routes[$anoteUrl] = new Route($anoteUrl, $m);
            }
        }

        return $this;
    }

    public function getRoute($anotePath)
    {
        if (isset($this->routes[$anotePath])) {
            return $this->routes[$anotePath];
        }

        throw new RouteNotFoundException('route not found.');
    }
}
