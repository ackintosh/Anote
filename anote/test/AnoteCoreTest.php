<?php
namespace Anote\test;

/**
 * Anote Core Test
 * @package Test
 */

require_once './phpunit_bootstrap.php';
require_once '../AnoteCore.php';

class AnoteCoreTest extends \PHPUnit_Framework_TestCase
{
    private $request = array('anote_path' => 'index');

    protected function setUp()
    {
        $this->anoteCore = new \Anote\AnoteCore($this->request);
        $this->assertSame('Anote\AnoteCore', get_class($this->anoteCore));
        $this->assertSame('Anote\Library\Viewer', get_class($this->anoteCore->viewer));
    }

    public function testIndex()
    {
    }
}
