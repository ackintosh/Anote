<?php
namespace Anote\Library;
use Anote\Library\Request\Post;
use Anote\Library\Exception\ChangingRequestException;
/**
 * Post Test
 * @package Test
 */

class PostTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function constructorSetsProperty()
    {
        $values = array('key1' => 'value1', 'key2' => 'value2');
        $post = new Post($values);

        $this->assertSame($values, \TestHelper::getPrivateProperty($post, 'values'));
    }

    /**
     * @test
     */
    public function getterReturnsProperty()
    {
        $values = array('key1' => 'value1', 'key2' => 'value2');
        $post = new Post($values);

        $this->assertSame('value1', $post->key1);
    }

    /**
     * @test
     * @expectedException \Anote\Library\Exception\ChangingRequestException
     */
    public function setterThrowsException()
    {
        $post = new Post(array());
        $post->foo = 'bar';
    }
}

