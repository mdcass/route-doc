<?php

namespace Mdcass\RouteDoc\Profile\Reflection;

abstract class ReflectorProfile
{
    /**
     * @var \ReflectionClass|\ReflectionMethod
     */
    protected $reflector;

    /**
     * Get the Class Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->reflector->getName();
    }
}
