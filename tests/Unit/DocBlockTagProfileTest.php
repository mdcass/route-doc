<?php

namespace Tests\Unit;

use Mdcass\RouteDoc\DocBlock\TagProfile;
use Mdcass\RouteDoc\Reflection\MethodProfile;
use Tests\Fixtures\UserController;
use Tests\SimpleTestCase;

class DocBlockTagProfileTest extends SimpleTestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testParamTag()
    {
        $methodProfile = new MethodProfile(new \ReflectionMethod(UserController::class, 'store'));
        $tags = $methodProfile->getTags();

        $this->assertTrue($tags[0] instanceof TagProfile);
        $this->assertEquals('param', $tags[0]->getName());
    }
}
