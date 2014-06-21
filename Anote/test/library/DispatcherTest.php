<?php
namespace Anote\Library;
use Anote\Library\Environment;
use Anote\Library\Request;
/**
 * Request Dispatcher Test
 * @package Test
 */

class DispatcherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function bootWithAnotePath()
    {
        $_GET['anote_path'] = 'test';
        ob_start();
        Dispatcher::boot(new Environment, new Request);
        $content = ob_get_clean();

        $this->assertTrue(strpos($content, 'my test') !== false);
    }

    /**
     * @test
     */
    public function bootWithoutAnotepath()
    {
        $_SERVER['REQUEST_URI'] = '/index.php/test';
        ob_start();
        Dispatcher::boot(new Environment, new Request);
        $content = ob_get_clean();

        $this->assertTrue(strpos($content, 'my test') !== false);
    }

    /**
     * @test
     */
    public function getFormattedAnotePath()
    {
        $result = \TestHelper::invokePrivateStaticMethod(
            'Anote\Library\Dispatcher',
            'getFormattedAnotePath',
            array('/index.php/test')
        );

        $this->assertSame('test', $result);
    }
}
