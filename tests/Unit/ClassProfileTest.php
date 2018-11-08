<?php

namespace Tests\Unit;

use Mdcass\RouteDoc\Reflection\ControllerProfile;
use phpDocumentor\Reflection\DocBlock;
use Tests\Fixtures\UserController;
use Tests\SimpleTestCase;

/**
 * Unit test uses ControllerProfile to test abstract functionality
 * of ClassProfile
 *
 * @see Mdcass\RouteDoc\Reflection\ClassProfile
 */
class ClassProfileTest extends SimpleTestCase
{
    /**
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testControllerProfileRetrievesDocBlock()
    {
        $controllerProfile = new ControllerProfile(new \ReflectionClass(UserController::class));

        $this->assertTrue($controllerProfile->getDocBlock() instanceof DocBlock);
        $this->assertTrue($controllerProfile->getName() === UserController::class);
    }

    /**
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testControllerProfileThrowsExceptionIfInvalidSubClass()
    {
        $this->expectException(\InvalidArgumentException::class);

        new ControllerProfile(new \ReflectionClass(self::class));
    }

    public function testControllerProfileCanReadDocBlock()
    {
        $controllerProfile = new ControllerProfile(new \ReflectionClass(UserController::class));

        $this->assertEquals('Users', $controllerProfile->getSummary());
        $this->assertEquals('<p>The API Resource for Users</p>', $controllerProfile->getDescription());
    }
}
