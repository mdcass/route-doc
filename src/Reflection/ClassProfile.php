<?php

namespace Mdcass\RouteDoc\Reflection;

use Mdcass\RouteDoc\Traits\HasDocBlock;

abstract class ClassProfile extends ReflectorProfile
{
    use HasDocBlock;

    /**
     * @var \ReflectionClass
     */
    protected $reflector;

    /**
     * @var string
     */
    protected $subClass;

    /**
     * ClassProfile constructor.
     *
     * @param \ReflectionClass $reflectionClass
     * @throws \Throwable
     */
    public function __construct(\ReflectionClass $reflectionClass)
    {
        $this->reflector = $reflectionClass;

        if ($this->subClass) {
            throw_unless(
                $this->reflector->isSubclassOf($this->subClass),
                new \InvalidArgumentException("Class [$reflectionClass->name] is not subclass of [$this->subClass]")
            );
        }

        /** @see HasDocBlock */
        $this->rawDocBlock = $this->reflector->getDocComment();
    }

    /**
     * @param bool $noParentMethods Don't include methods from parent classes (default true)
     * @return MethodProfile[]
     */
    public function methods($noParentMethods = true)
    {
        if (!$noParentMethods) {
            return $this->reflector->getMethods();
        }

        $methods = array_filter($this->reflector->getMethods(), function ($method) {
            /** @var \ReflectionMethod $method */
            return $method->getDeclaringClass()->getName() === $this->reflector->getName();
        });

        return array_map(function ($method) {
            return new MethodProfile($method);
        }, $methods);
    }
}
