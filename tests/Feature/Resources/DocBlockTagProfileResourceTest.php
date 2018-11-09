<?php

namespace Tests\Feature\Resources;

use Illuminate\Http\Request;
use Mdcass\RouteDoc\Http\Resources\DocBlock\TagProfileResource;
use Mdcass\RouteDoc\Profile\Reflection\ControllerProfile;
use Tests\Fixtures\UserController;
use Tests\TestCase;

class DocBlockTagProfileResourceTest extends TestCase
{
    /**
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testResourceOutput()
    {
        $controllerProfile = new ControllerProfile(new \ReflectionClass(UserController::class));
        $tags = $controllerProfile->getTags();

        $resource = new TagProfileResource($tags[0]);

        $this->assertArraySubset([
            'name'   => 'package',
            'description' => 'Mdcass\RouteDoc',
        ], $resource->toArray(new Request()));
    }
}
