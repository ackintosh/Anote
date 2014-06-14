<?php
namespace Anote\Library;
use Anote\Library\Layout;
use Anote\Library\Environment;
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
        $this->viewer->setEnvironment(new Environment);
        $this->assertSame('Anote\Library\Viewer', get_class($this->viewer));
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
        $this->viewer->setLayout(new Layout('layout_does_not_exist'));
        $this->viewer->render('index');
    }
}
