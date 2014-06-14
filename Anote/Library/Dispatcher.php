<?php
namespace Anote\Library;
use Anote\AnoteCore;
use Anote\Library\Request\Get;
use Anote\Library\Viewer;
use Anote\Library\Layout;
use Anote\Library\RoutingTable;
use Anote\Library\Exception\RouteNotFoundException;
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
            $routingTable = new RoutingTable($core);
            $route = $routingTable->getRoute($this->anote_path);
            $func = $route->getMethodName();

            $core->get = new Get($this->get);
            $core->viewer = new Viewer;
            $core->viewer->setLayout(new Layout(AnotationParser::anoteLayout(Reflection::getMethodComment($core, $func))));
            $core->$func();
            $core->viewer->render($func);
        } catch (RouteNotFoundException $e) {
            header('HTTP/1.0 404 Not Found');
            exit;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    private function getFormattedAnotePath($anote_path)
    {
        return preg_replace(array('#\A\/#', '#\/\z#', '#\Aindex\.php\/#'), '', $anote_path);
    }
}
