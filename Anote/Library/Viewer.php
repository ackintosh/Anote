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
        if(false === @include($this->environment->anoteRoot . '/view/' . $templateName . '.php')) {
            ob_end_clean();
            throw new \InvalidArgumentException('Template file is not found.');
        }

        $this->_content = ob_get_clean();
        ob_start();
        if (false === @include($this->layout->getFullPath())) {
            ob_end_clean();
            throw new \InvalidArgumentException('Layout file is not found.');
        }
        return ob_get_clean();
    }
}
