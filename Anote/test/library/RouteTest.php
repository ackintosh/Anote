<?php
namespace Anote\Library;

class RouteTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $method = new \Stdclass;
        $method->name = 'foo';
        $this->route = new Route('testurl', $method);
    }

    /**
     * @test
     */
    public function getUrl()
    {
        $this->assertSame('testurl', $this->route->getUrl());
    }

    /**
     * @test
     */
    public function getMethodName()
    {
        $this->assertSame('foo', $this->route->getMethodName());
    }
}
