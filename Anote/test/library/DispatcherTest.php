<?php
namespace Anote\Library;
/**
 * Request Dispatcher Test
 * @package Test
 */

class DispatcherTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
    }

    public function testAnotePath()
    {
        $get = array('anote_path' => 'index');
        $dispatcher = new Dispatcher($get);
        $this->assertSame('Anote\Library\Dispatcher', get_class($dispatcher));
        $this->assertEquals('index', $dispatcher->anote_path);
    }
}
