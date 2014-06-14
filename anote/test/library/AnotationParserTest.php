<?php
namespace Anote\Library;
/**
 * AnotationParser Test
 * @package Test
 */

class AnotationParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returnsValue()
    {
        $comment = "/**\n     * ReflectionTestSample::func1()\n     * @key1(value1)\n     * @key2(value2)\n     */";

        $this->assertSame('value1', AnotationParser::key1($comment));
        $this->assertSame('value2', AnotationParser::key2($comment));
    }
}
