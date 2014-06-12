<?php
/**
 * FrontController
 */
use anote\library\Autoloader;
use anote\library\ConfigManager;
use anote\library\Dispatcher;
use anote\library\FrontController;
use anote\library\AnotationParser;

define('ROOT', realpath(dirname(__FILE__) . '/../'));
define('ANOTE_ROOT', ROOT . '/anote');
define('WEB_ROOT', ROOT . '/webroot');

require_once(ANOTE_ROOT . '/library/Autoloader.php');
$autoloader = new Autoloader();
$autoloader->register(array($autoloader, 'load'));

require_once ANOTE_ROOT . '/library/vendor/php-activerecord/ActiveRecord.php';
ActiveRecord\Config::initialize(function($cfg)
{
	$array_connections = array();
	foreach (ConfigManager::getConfig('database') as $env => $cnf) {
		$array_connections[$env] = "{$cnf['dbtype']}://{$cnf['user']}:{$cnf['password']}@{$cnf['host']}/{$cnf['dbname']}";
	}

	$cfg->set_model_directory(ANOTE_ROOT . '/model');
	$cfg->set_connections($array_connections);
	$cfg->set_default_connection('development');
});

if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
	header_register_callback(function(){
		foreach (headers_list() as $header) {
			if (strpos($header, 'X-Powered-By:') !== false) header_remove('X-Powered-By');
		}
	});
}

FrontController::act($_GET);
