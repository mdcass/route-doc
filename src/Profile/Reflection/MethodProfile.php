<?php

namespace Mdcass\RouteDoc\Profile\Reflection;

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

    /**
     * @return RequestProfile|bool
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function getFormRequestClassProfile()
    {
        foreach ($this->reflector->getParameters() as $parameter) {
            if (class_exists($parameter->getType()->getName())) {
                $reflector = new \ReflectionClass($parameter->getType()->getName());

                if ($reflector->isSubclassOf(\Illuminate\Foundation\Http\FormRequest::class)) {
                    return new RequestProfile($reflector);
                }
            }
        }

        return false;
    }
}
