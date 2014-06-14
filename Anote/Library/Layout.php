<?php
namespace Anote\Library;

class Layout
{
    private $layoutRootPath;
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename . '.php';
    }

    public function setLayoutRootPath($path)
    {
        $this->layoutRootPath = $path;
    }

    public function getFullPath()
    {
        return $this->layoutRootPath . '/' . $this->filename;
    }

    public function isFileExists()
    {
        return file_exists($this->getFullPath());
    }
}
