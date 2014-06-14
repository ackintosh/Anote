<?php
/**
 * definitions for the test run
 */
define('ROOT', realpath(dirname(__FILE__) . '/../../') . '/');
define('ANOTE_ROOT', ROOT . 'Anote/');
define('WEB_ROOT', ROOT . 'webroot/');

require_once __DIR__ . '/TestHelper.php';
require_once('../Library/Autoloader.php');

$autoloader = (new \Anote\Library\Autoloader())->setRootPath(ROOT);
$autoloader->register(array($autoloader, 'load'));
