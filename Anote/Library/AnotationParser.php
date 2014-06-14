<?php
namespace Anote\Library;

class AnotationParser
{
    public static function __callStatic($name, $args)
    {
        $anotation = $args[0];
        if(preg_match('/@' . $name . '(.*)/', $anotation, $matches)) {
            return preg_replace(array('/^\(\//', '/^\(/', '/\/\)$/', '/\)$/'), '', $matches[1]);
        }

        return;
    }
}
