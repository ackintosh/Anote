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
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testTemplateNotFound()
    {
        $this->viewer->setEnvironment(new Environment);
        $this->viewer->render('template_does_not_exist');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testLayoutNotFound()
    {
        $this->viewer->setEnvironment(new Environment);
        $this->viewer->setLayout(new Layout('layout_does_not_exist'));
        $this->viewer->render('index');
    }
}
