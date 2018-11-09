<?php

namespace Tests\Unit;

use Mdcass\RouteDoc\Profile\FieldValidationProfile;
use Mdcass\RouteDoc\Profile\Reflection\RequestProfile;
use Tests\Fixtures\StoreUserRequest;
use Tests\TestCase;

class RequestProfileTest extends TestCase
{
    public function testRulesRetrieved()
    {
        $requestProfile = new RequestProfile(new \ReflectionClass(StoreUserRequest::class));

        $rules = $requestProfile->rules();

        $this->assertTrue($rules[0] instanceof FieldValidationProfile);
    }
}
