<?php

namespace Mdcass\RouteDoc\Reflection;

abstract class ClassProfile
{
    /**
     * @var \phpDocumentor\Reflection\DocBlockFactory
     */
    protected $docBlockFactory;

    /**
     * @var \ReflectionClass
     */
    protected $reflectionClass;

    /**
     * @var string
     */
    protected $subClass;

    /**
     * @var string|null
     */
    protected $rawDocBlock;

    /**
     * ClassProfile constructor.
     *
     * @param string $class
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function __construct(string $class)
    {
        $this->reflectionClass = new \ReflectionClass($class);
        $this->docBlockFactory = \phpDocumentor\Reflection\DocBlockFactory::createInstance();

        if ($this->subClass) {
            throw_unless(
                $this->reflectionClass->isSubclassOf($this->subClass),
                new \InvalidArgumentException("Class [$class] is not subclass of [$this->subClass]")
            );
        }

        $this->rawDocBlock = $this->reflectionClass->getDocComment();
    }

    /**
     * @return \phpDocumentor\Reflection\DocBlock|null
     */
    public function getDocBlock()
    {
        return $this->rawDocBlock
            ? $this->docBlockFactory->create($this->rawDocBlock)
            : null;
    }

    /**
     * @return null|string
     */
    public function getSummary()
    {
        return $this->getDocBlock()
            ? $this->getDocBlock()->getSummary()
            : null;
    }
}
