<?php
namespace Anote\Library;
use Anote\AnoteCore;
use Anote\Library\Request\Get;
use Anote\Library\Viewer;
/**
 * Request Dispatcher
 * @package Library
 */

class Dispatcher
{
    public function __construct($get)
    {
        if (isset($get['anote_path']) && !empty($get['anote_path'])) {
            $this->anote_path = $this->getFormattedAnotePath($get['anote_path']);
        } else {
            $this->anote_path = $this->getFormattedAnotePath($_SERVER['REQUEST_URI']);
        }
        $this->get = $get;

        return $this;
    }

    public function boot()
    {
        try {
            $core = new AnoteCore();
            $core->get = new Get($this->get);
            $core->viewer = new Viewer;
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
        return preg_replace(array('#\A\/#', '#\/\z#', '#\Aindex\.php\/#'), '', $anote_path);
    }
}
