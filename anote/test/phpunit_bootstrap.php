<?php
/**
 * definitions for the test run
 */
require_once 'PHPUnit/Autoload.php';

define('ROOT', realpath(dirname(__FILE__) . '/../../') . '/');
define('ANOTE_ROOT', ROOT . 'Anote/');
define('WEB_ROOT', ROOT . 'webroot/');

require_once('../Library/Autoloader.php');
$autoloader = new \Anote\Library\Autoloader();
$autoloader->register(array($autoloader, 'load'));
