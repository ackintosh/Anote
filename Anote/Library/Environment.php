<?php
namespace Anote\Library;

class Environment
{
    private $env;
    private $params = array();

    public function __construct($env = 'development')
    {
        $this->params['env'] = $env;
        $this->setPaths(realpath(__DIR__ . '/../../'));
    }

    public function __get($name)
    {
        return $this->params[$name];
    }

    private function setPaths($root)
    {
        $this->params['root']       = $root;
        $this->params['anoteRoot']  = $root . '/Anote';
        $this->params['webRoot']    = $root . '/webroot';
    }

    public function setServerEnvironment($server)
    {
        $this->params['server'] = $server;
        return $this;
    }
}
