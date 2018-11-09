<?php

namespace Mdcass\RouteDoc\Http\Resources\Reflector;

use Illuminate\Http\Resources\Json\JsonResource;
use Mdcass\RouteDoc\Http\Resources\DocBlock\TagProfileResource;
use Mdcass\RouteDoc\Profile\Reflection\ClassProfile;

/**
 * @property ClassProfile $resource
 */
abstract class ReflectorProfileResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'        => $this->resource->getName(),
            'summary'     => $this->resource->getSummary(),
            'description' => $this->resource->getDescription(),
            'tags'        => TagProfileResource::collection(collect($this->resource->getTags()))->toArray($request),
        ];
    }
}
