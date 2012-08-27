<?php
/**
 * definitions for the test run
 */
require_once 'PHPUnit/Autoload.php';

define('ROOT', realpath(dirname(__FILE__) . '/../../') . '/');
define('ANOTE_ROOT', ROOT . 'anote/');
define('WEB_ROOT', ROOT . 'webroot/');

require_once('../library/Autoloader.php');
$autoloader = new \anote\library\Autoloader();
$autoloader->register(array($autoloader, 'load'));
