<?php
namespace Anote\test;

/**
 * Anote Core Test
 * @package Test
 */

require_once realpath(__DIR__ . '/../') . '/AnoteCore.php';

class AnoteCoreTest extends \PHPUnit_Framework_TestCase
{
    private $request = array('anote_path' => 'index');

    protected function setUp()
    {
        $this->anoteCore = new \Anote\AnoteCore();
        $this->assertSame('Anote\AnoteCore', get_class($this->anoteCore));
    }

    public function testIndex()
    {
    }
}
