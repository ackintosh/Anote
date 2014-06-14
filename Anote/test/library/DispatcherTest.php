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
        $get = array('anote_path' => 'index');
        $environment = new Environment;
        $this->dispatcher = new Dispatcher($environment, $get);
    }

    /**
     * @test
     */
    public function anotePath()
    {
        $this->assertEquals('index', \TestHelper::getPrivateProperty($this->dispatcher, 'anote_path'));
    }

    /**
     * @test
     */
    public function constructorSetsAnotePath()
    {
        $env = (new Environment)->setServerEnvironment(array('REQUEST_URI' => '/index.php/test'));
        $dispatcher = new Dispatcher($env, array());
        $this->assertSame('test', \TestHelper::getPrivateProperty($dispatcher, 'anote_path'));
    }

    /**
     * @test
     */
    public function boot()
    {
        ob_start();
        $this->dispatcher->boot();
        $content = ob_get_clean();
        $this->assertTrue(!is_null($content));
    }
}
