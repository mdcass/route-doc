<?php

namespace Tests\Unit;

use Mdcass\RouteDoc\Profile\DocBlock\TagProfile;
use Mdcass\RouteDoc\Profile\Reflection\MethodProfile;
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
