<?php
namespace Anote\Library;

class EnvironmentTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->env = new Environment;
    }

    /**
     * @test
     */
    public function constructorSetsParams()
    {
        $params = \TestHelper::getPrivateProperty($this->env, 'params');
        $this->assertSame('development', $params['env']);
    }
}
