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
    public static function boot($environment, $request, $response)
    {
        try {
            if ($request->get->anote_path !== null) {
                $anote_path = self::getFormattedAnotePath($request->get->anote_path);
            } else {
                $anote_path = self::getFormattedAnotePath($environment->server['REQUEST_URI']);
            }

            $core = new AnoteCore;
            $routingTable = new RoutingTable($core);
            $route = $routingTable->getRoute($anote_path);
            $func = $route->getMethodName();

            $core->request = $request;
            $core->viewer = (new Viewer)
                ->setEnvironment($environment)
                ->setLayout(new Layout(AnotationParser::anoteLayout(Reflection::getMethodComment($core, $func))));

            $core->$func();
            echo $core->viewer->render($func);
        } catch (RouteNotFoundException $e) {
            $response->notFound();
        }
    }

    private static function getFormattedAnotePath($anote_path)
    {
        return preg_replace(array('#\A\/#', '#\/\z#', '#\Aindex\.php\/#'), '', $anote_path);
    }
}
