<?php
namespace anote\library;
/**
 * Request Dispatcher
 * @package Library
 */

class Dispatcher
{
	public function __construct($get)
	{
		$this->anote_path = (@$get['anote_path'] === null) ? 'index' : $this->_getFormattedAnotePath($get['anote_path']);
		$this->request = $get;
	}

	public function boot()
	{
		try {
			$core = new \anote\AnoteCore($this->request);
			$func = $this->_getCoreFunction($core);
			$core->viewer->layout = $this->_getCoreLayout($core, $func);
			$core->$func();
			$core->viewer->render($func);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}

	private function _getCoreFunction($core)
	{
        foreach (Reflection::getMethods($core) as $method) {
            if ($this->anote_path === AnotationParser::anoteURL($method->getDocComment())) {
                return $method->name;
            }
        }

		/* diaplay 404 error */
		return 'anote404';
	}

	private function _getCoreLayout($core, $func)
	{
        $layoutName = AnotationParser::anoteLayout(Reflection::getMethodComment($core, $func));
		if (empty($layoutName)) {
			throw new \Exception('Setting the layout is not defined.');
		} else {
			return $layoutName;
		}
	}

	private function _getFormattedAnotePath($anote_path)
	{
		return preg_replace(array('/^\//', '/\/$/'), '', $anote_path);
	}
}
