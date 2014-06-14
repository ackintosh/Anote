<?php
/**
 * FrontController
 */
use Anote\Library\Autoloader;
use Anote\Library\ConfigManager;
use Anote\Library\Dispatcher;
use Anote\Library\FrontController;
use Anote\Library\AnotationParser;

define('ROOT', realpath(dirname(__FILE__) . '/../'));
define('ANOTE_ROOT', ROOT . '/Anote');
define('WEB_ROOT', ROOT . '/webroot');

require_once(ANOTE_ROOT . '/Library/Autoloader.php');
$autoloader = (new Autoloader())->setRootPath(ROOT);
$autoloader->register(array($autoloader, 'load'));

require_once ANOTE_ROOT . '/Library/vendor/php-activerecord/ActiveRecord.php';
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

FrontController::act($_GET);
