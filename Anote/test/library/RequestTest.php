<?php
namespace Anote\Library;
/**
 * Request Test
 * @package Test
 */

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->request = new Request;
    }

    /**
     * @test
     */
    public function constructorSetsProperty()
    {
        $this->assertInstanceOf('Anote\Library\Request\Get', $this->request->get);
        $this->assertInstanceOf('Anote\Library\Request\Post', $this->request->post);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function getterThrowsException()
    {
        $this->request->nothig;
    }
}
