<?php

class TestHelper
{
    public static function getPrivateProperty($object, $propName)
    {
        $clazz = new \ReflectionClass(get_class($object));
        $property = $clazz->getProperty($propName);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}
