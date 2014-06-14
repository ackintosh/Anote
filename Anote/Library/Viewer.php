<?php
namespace Anote\Library;
/**
 * Page Viewer
 * @package Library
 */

class Viewer
{
    private $_content;
    private $layout;
    private $environment;

    public function __construct()
    {

    }

    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    public function setLayout($layout)
    {
        $layout->setLayoutRootPath($this->environment->anoteRoot . '/view/layout');
        $this->layout = $layout;
        return $this;
    }

    public function render($templateName)
    {
        ob_start();
        if(false === @include_once($this->environment->anoteRoot . '/view/' . $templateName . '.php')) {
            throw new \InvalidArgumentException('Template file is not found.');
        }

        $this->_content = ob_get_clean();
        if (false === @include_once($this->layout->getFullPath())) {
            throw new \InvalidArgumentException('Layout file is not found.');
        }
        exit;
    }
}
