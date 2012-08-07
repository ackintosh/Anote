<?php
/**
 * FrontController
 * twitter bootstrap v2.0.4
 */

use anote\library\Autoloader;


define('ROOT', realpath(dirname(__FILE__) . '/../'));
define('ANOTE_ROOT', ROOT . '/anote');
define('WEB_ROOT', ROOT . '/webroot');

require_once(ANOTE_ROOT . '/library/Autoloader.php');
$autoloader = new Autoloader();
$autoloader->register(array($autoloader, 'load'));


FrontController::go();


class FrontController
{
	public static function go()
	{
		self::_init();
		$dispatcher = new anote\library\Dispatcher($_GET);
		$dispatcher->boot();
	}

	private static function _init()
	{
		ini_set('default_charset', 'utf-8');
		ini_set('mbstring.script_encoding', 'utf-8');
		ini_set('mbstring.internal_encoding', 'utf-8');
		ini_set('mbstring.substitute_character', '?');
		ini_set('mbstring.http_input' , 'pass');
		ini_set('mbstring.http_output' , 'pass');
	}
}