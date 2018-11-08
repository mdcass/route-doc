<?php

namespace Mdcass\RouteDoc\Reflection;

abstract class ReflectorProfile
{
    /**
     * @var \ReflectionClass|\ReflectionMethod
     */
    protected $reflector;

    public function getName()
    {
        return $this->reflector->getName();
    }
}
