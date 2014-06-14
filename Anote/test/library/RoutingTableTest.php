<?php
namespace Anote\Library;
use Anote\AnoteCore;

class RoutingTableTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->routingTable = new RoutingTable(new AnoteCore);
    }

    /**
     * @test
     */
    public function getRoute()
    {
        $route = $this->routingTable->getRoute('index');
        $this->assertSame('index', $route->getUrl());
    }

    /**
     * @test
     * @expectedException \Anote\Library\Exception\RouteNotFoundException
     */
    public function getRouteThrowsExceptionWhenRouteNotFound()
    {
        $this->routingTable->getRoute('invalid_route');
    }
}
