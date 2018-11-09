<?php

namespace Tests\Unit;

use Mdcass\RouteDoc\Reflection\ControllerProfile;
use Mdcass\RouteDoc\Reflection\MethodProfile;
use Mdcass\RouteDoc\Reflection\RequestProfile;
use Tests\Fixtures\UserController;
use Tests\SimpleTestCase;

class MethodProfileTest extends SimpleTestCase
{
    /**
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testMethodProfilesRetrievedFromController()
    {
        $controllerProfile = new ControllerProfile(new \ReflectionClass(UserController::class));

        $methodProfiles = $controllerProfile->methods();

        $this->assertEquals('index', array_first($methodProfiles)->getName());
    }

    /**
     * @throws \ReflectionException
     */
    public function testMethodProfileCanReadDocBlock()
    {
        $methodProfile = new MethodProfile(new \ReflectionMethod(UserController::class, 'index'));
        $this->assertEquals('Display a listing of the resource', $methodProfile->getSummary());
    }

    public function testMethodProfileCanCreateClassProfileForFormRequest()
    {
        $methodProfile = new MethodProfile(new \ReflectionMethod(UserController::class, 'store'));
        $this->assertTrue($methodProfile->getFormRequestClassProfile() instanceof RequestProfile);
    }
}
