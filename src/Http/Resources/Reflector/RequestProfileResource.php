<?php

namespace Mdcass\RouteDoc\Http\Resources\Reflector;

use Mdcass\RouteDoc\Profile\Reflection\RequestProfile;

/**
 * @property RequestProfile $resource
 */
class RequestProfileResource extends ReflectorProfileResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(
            parent::toArray($request),
            [
                'rules' => $this->resource->rules(),
            ]
        );
    }
}
