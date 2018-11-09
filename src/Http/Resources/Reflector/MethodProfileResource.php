<?php

namespace Mdcass\RouteDoc\Http\Resources\Reflector;

use Mdcass\RouteDoc\Reflection\MethodProfile;

/**
 * @property MethodProfile $resource
 */
class MethodProfileResource extends ReflectorProfileResource
{
    /**
     * @param $request
     * @return array
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function toArray($request)
    {
        $requestProfile = $this->resource->getFormRequestClassProfile();

        return array_merge(
            parent::toArray($request),
            [
                'request' => $requestProfile ? (new ClassProfileResource($requestProfile))->toArray($request) : false,
            ]
        );
    }
}
