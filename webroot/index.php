<?php
/**
 * FrontController
 */
use Anote\Library\Autoloader;
use Anote\Library\Environment;
use Anote\Library\ConfigManager;
use Anote\Library\Dispatcher;
use Anote\Library\FrontController;
use Anote\Library\AnotationParser;

require_once(realpath(__DIR__ . '/../Anote') . '/Library/Autoloader.php');
$autoloader = (new Autoloader())->setRootPath(realpath(__DIR__ . '/../'));
$autoloader->register(array($autoloader, 'load'));

$environment = new Environment();

require_once $environment->anoteRoot . '/Library/vendor/php-activerecord/ActiveRecord.php';
ActiveRecord\Config::initialize(function($cfg) use ($environment)
{
    $array_connections = array();
    foreach (ConfigManager::getConfig('database') as $env => $cnf) {
        $array_connections[$env] = "{$cnf['dbtype']}://{$cnf['user']}:{$cnf['password']}@{$cnf['host']}/{$cnf['dbname']}";
    }

    $cfg->set_model_directory($environment->anoteRoot . '/model');
    $cfg->set_connections($array_connections);
    $cfg->set_default_connection($environment->env);
});

FrontController::act($environment, $_GET);
