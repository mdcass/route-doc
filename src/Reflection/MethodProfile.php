<?php

namespace Mdcass\RouteDoc\Reflection;

use Mdcass\RouteDoc\Traits\HasDocBlock;

class MethodProfile extends ReflectorProfile
{
    use HasDocBlock;

    /**
     * @var \ReflectionMethod
     */
    protected $reflector;

    /**
     * MethodProfile constructor.
     * @param \ReflectionMethod $reflectionMethod
     */
    public function __construct(\ReflectionMethod $reflectionMethod)
    {
        $this->reflector = $reflectionMethod;

        /** @see HasDocBlock */
        $this->rawDocBlock = $this->reflector->getDocComment();
    }
}
