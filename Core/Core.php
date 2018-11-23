<?php

namespace Core;

class Core
{
    /**
     * @param $class
     * @param $type
     * @return object
     * @throws \ReflectionException
     */
    public function createClassInstance($class, $type)
    {
        switch ($type) {
            case 'controller':
                $class = new \ReflectionClass($class);
                break;
            case 'model':
                $class = new \ReflectionClass(DEFAULT_MODEL_PREFIX . '\\' . $class);
                break;
            default:
                $class = new \ReflectionClass(DEFAULT_MODEL_PREFIX . '\\' . $class);
                break;
        }

        // Let's get all the constructor parameters
        $reflectionParameters = $class->getConstructor()->getParameters();

        $dependencies = [];
        foreach($reflectionParameters as $param) {
            $dependencies[] = $param->getClass()->newInstance();
        }
        $instance = $class->newInstanceArgs($dependencies);
        return $instance;
    }
}