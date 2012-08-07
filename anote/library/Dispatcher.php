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
		$clazz = new \ReflectionClass($core);
		
		foreach ($clazz->getMethods() as $method) {
			$comment = $clazz->getMethod($method->name)->getDocComment();
			$url = $this->_getAnoteInfoFromComment('anoteURL', $comment);
			if ($url == $this->anote_path) return $method->name;
		}

		/* diaplay 404 error */
		return 'anote404';
	}

	private function _getAnoteInfoFromComment($infoName, $comment)
	{
		if(preg_match('/@' . $infoName . '(.*)/', $comment, $matches)) {
			return preg_replace(array('/^\(\//', '/^\(/', '/\/\)$/', '/\)$/'), '', $matches[1]);
		}
	}

	private function _getCoreLayout($core, $func)
	{
		$clazz = new \ReflectionClass($core);
		$comment = $clazz->getMethod($func)->getDocComment();
		$layoutName = $this->_getAnoteInfoFromComment('anoteLayout', $comment);
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