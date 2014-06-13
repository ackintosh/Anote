<?php
namespace anote\library;
/**
 * Page Viewer Test
 * @package Test
 */

require_once './phpunit_bootstrap.php';


class ViewerTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->viewer = new Viewer();
        $this->assertSame('anote\library\Viewer', get_class($this->viewer));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testTemplateNotFound()
    {
        $this->viewer->render('template_does_not_exist');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testLayoutNotFound()
    {
        $this->viewer->layout = 'layout_does_not_exist';
        $this->viewer->render('index');
    }
}
