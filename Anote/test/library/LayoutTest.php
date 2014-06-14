<?php
namespace Anote\Library;

class LayoutTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->layout = new Layout('testfile');
    }

    /**
     * @test
     */
    public function setLayoutRootPath()
    {
        $rootPath = 'testrootpath';
        $this->layout->setLayoutRootPath($rootPath);
        $this->assertSame($rootPath, \TestHelper::getPrivateProperty($this->layout, 'layoutRootPath'));
    }

    /**
     * @test
     */
    public function getFullPath()
    {
        $rootPath = 'testrootpath';
        $this->layout->setLayoutRootPath($rootPath);
        $this->assertSame($rootPath . '/testfile.php', $this->layout->getFullPath());
    }

    /**
     * @test
     */
    public function isFileExists()
    {
        $this->layout->setLayoutRootPath('test');
        $this->assertFalse($this->layout->isFileExists());
    }
}
