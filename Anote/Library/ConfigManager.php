<?php
namespace Anote\Library;
/**
 * Config Manager
 * @package Library
 */

require_once __DIR__ . '/vendor/spyc/spyc.php';
class ConfigManager
{
    private $params = array();
    public function __construct($filename)
    {
        $this->params = \Spyc::YAMLLoad(realpath(__DIR__ . '/../') . "/config/{$filename}.yml");
    }

    public static function getConfig($filename)
    {
        return \Spyc::YAMLLoad(realpath(__DIR__ . '/../') . "/config/{$filename}.yml");
    }
}
