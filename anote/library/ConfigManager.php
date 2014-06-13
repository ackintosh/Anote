<?php
namespace anote\library;
/**
 * Config Manager
 * @package Library
 */

require_once ANOTE_ROOT . '/library/vendor/spyc/spyc.php';
class ConfigManager
{
    private $params = array();
    public function __construct($filename)
    {
        $this->params = \Spyc::YAMLLoad(ANOTE_ROOT . "/config/{$filename}.yml");
    }

    public static function getConfig($filename)
    {
        return \Spyc::YAMLLoad(ANOTE_ROOT . "/config/{$filename}.yml");
    }
}
