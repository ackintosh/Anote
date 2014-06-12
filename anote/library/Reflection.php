<?php
namespace anote\library;
/**
 * Reflection
 * @package Library
 */

class Reflection
{
    public static function getMethods($object)
    {
        $clazz = new \ReflectionClass($object);
        return $clazz->getMethods();
    }

    public static function getMethodComment($object, $methodName)
    {
		$clazz = new \ReflectionClass($object);
        return $clazz->getMethod($methodName)->getDocComment();
    }
}
