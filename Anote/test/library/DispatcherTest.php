<?php
namespace Anote\Library;
use Anote\Library\Environment;
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
        $environment = new Environment;
        $dispatcher = new Dispatcher($environment, $get);
        $this->assertSame('Anote\Library\Dispatcher', get_class($dispatcher));
        $this->assertEquals('index', $dispatcher->anote_path);
    }
}
