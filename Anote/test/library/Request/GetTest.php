<?php
namespace Anote\Library;
use Anote\Library\Request\Get;
use Anote\Library\Exception\ChangingRequestException;
/**
 * Get Test
 * @package Test
 */

class GetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function constructorSetsProperty()
    {
        $values = array('key1' => 'value1', 'key2' => 'value2');
        $get = new Get($values);

        $this->assertSame($values, \TestHelper::getPrivateProperty($get, 'values'));
    }

    /**
     * @test
     */
    public function getterReturnsProperty()
    {
        $values = array('key1' => 'value1', 'key2' => 'value2');
        $get = new Get($values);

        $this->assertSame('value1', $get->key1);
    }

    /**
     * @test
     * @expectedException \Anote\Library\Exception\ChangingRequestException
     */
    public function setterThrowsException()
    {
        $get = new Get(array());
        $get->foo = 'bar';
    }
}
