<?php

namespace Tests\Unit;

use Mdcass\RouteDoc\Reflection\ControllerProfile;
use phpDocumentor\Reflection\DocBlock;
use Tests\Fixtures\UserController;
use Tests\SimpleTestCase;

class ClassProfileTest extends SimpleTestCase
{
    /**
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testControllerProfileRetrievesDocBlock()
    {
        $controllerProfile = new ControllerProfile(UserController::class);

        $this->assertTrue($controllerProfile->getDocBlock() instanceof DocBlock);
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testControllerProfileThrowsExceptionIfInvalidSubClass()
    {
        $this->expectException(\InvalidArgumentException::class);

        new ControllerProfile(self::class);
    }
}
