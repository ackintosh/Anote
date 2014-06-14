<?php
namespace Anote\Library;
/**
 * Reflection Test
 * @package Test
 */

class ReflectionTestSample
{
    /**
     * ReflectionTestSample::func1()
     */
    public function func1() {}
    public function func2() {}
}

class ReflectionTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->sample = new ReflectionTestSample;
    }

    /**
     * @test
     */
    public function getMethodsReturnsArrayOfReflectionMethodObjects()
    {
        $expectNames = array('func1', 'func2');
        $methods = Reflection::getMethods($this->sample);
        foreach ($methods as $m) {
            $this->assertInstanceOf('ReflectionMethod', $m);
            $this->assertTrue(in_array($m->name, $expectNames));
        }
    }

    /**
     * @test
     */
    public function getMethodCommentReturnsComment()
    {
        $expect = "/**\n     * ReflectionTestSample::func1()\n     */";
        $comment = Reflection::getMethodComment($this->sample, 'func1');
        $this->assertSame($expect, $comment);
    }
}
