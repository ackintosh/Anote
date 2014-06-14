<?php
namespace Anote\Library;
/**
 * Page Viewer
 * @package Library
 */

class Viewer
{
    private $_content;

    public function __construct()
    {

    }

    public function render($templateName)
    {
        ob_start();
        if(false === @include_once(ANOTE_ROOT . '/view/' . $templateName . '.php')) {
            throw new \InvalidArgumentException('Template file is not found.');
        }

        $this->_content = ob_get_clean();
        if (false === @include_once(ANOTE_ROOT . '/view/layout/' . $this->layout . '.php')) {
            throw new \InvalidArgumentException('Layout file is not found.');
        }
        exit;
    }
}
