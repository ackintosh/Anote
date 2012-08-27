<?php
/**
 * FrontController
 */
use anote\library\Autoloader;

define('ROOT', realpath(dirname(__FILE__) . '/../') . '/');
define('ANOTE_ROOT', ROOT . 'anote/');
define('WEB_ROOT', ROOT . 'webroot/');

require_once(ANOTE_ROOT . 'library/Autoloader.php');
$autoloader = new Autoloader();
$autoloader->register(array($autoloader, 'load'));

require_once ANOTE_ROOT . 'library/vendor/php-activerecord/ActiveRecord.php';
ActiveRecord\Config::initialize(function($cfg)
{
	$cfg->set_model_directory(ANOTE_ROOT . 'model');
	$cfg->set_connections(
		array(
			'development' => 'mysql://root:root@localhost/active_record', 
			'production' => 'mysql://username:password@localhost/production',
			'test' => 'mysql://username:password@localhost/test'
		)
	);
	$cfg->set_default_connection('development');
});

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