<?php
/**
 * definitions for the test run
 */
require_once __DIR__ . '/TestHelper.php';
require_once(realpath(__DIR__ . '/../') . '/Library/Autoloader.php');

$autoloader = (new \Anote\Library\Autoloader())->setRootPath(realpath(dirname(__FILE__) . '/../../') . '/');
$autoloader->register(array($autoloader, 'load'));
