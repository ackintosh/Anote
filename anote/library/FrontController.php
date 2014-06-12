<?php
namespace anote\library;
/**
 * FrontController
 * @package Library
 */

class FrontController
{
	public static function act($request)
	{
		self::_init();
		$dispatcher = new Dispatcher($request);
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
