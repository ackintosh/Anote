<?php
namespace Anote\Library;

class Route
{
    private $url;
    private $method;

    public function __construct($url, $method)
    {
        $this->url = $url;
        $this->method = $method;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMethodName()
    {
        return $this->method->name;
    }
}
