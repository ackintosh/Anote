<?php
namespace Anote\Library;
/**
 * Request Dispatcher
 * @package Library
 */

class Dispatcher
{
    public function __construct($get)
    {
        $this->anote_path = (@$get['anote_path'] === null) ? 'index' : $this->getFormattedAnotePath($get['anote_path']);
        $this->request = $get;
    }

    public function boot()
    {
        try {
            $core = new \Anote\AnoteCore($this->request);
            $func = $this->getCoreFunction($core);
            $core->viewer->layout = $this->getCoreLayout($core, $func);
            $core->$func();
            $core->viewer->render($func);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    private function getCoreFunction($core)
    {
        foreach (Reflection::getMethods($core) as $method) {
            if ($this->anote_path === AnotationParser::anoteURL($method->getDocComment())) {
                return $method->name;
            }
        }

        /* diaplay 404 error */
        return 'anote404';
    }

    private function getCoreLayout($core, $func)
    {
        $layoutName = AnotationParser::anoteLayout(Reflection::getMethodComment($core, $func));
        if (empty($layoutName)) {
            throw new \Exception('Setting the layout is not defined.');
        } else {
            return $layoutName;
        }
    }

    private function getFormattedAnotePath($anote_path)
    {
        return preg_replace(array('/^\//', '/\/$/'), '', $anote_path);
    }
}
