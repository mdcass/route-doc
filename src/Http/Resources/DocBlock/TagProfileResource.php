<?php

namespace Mdcass\RouteDoc\Http\Resources\DocBlock;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource \Mdcass\RouteDoc\DocBlock\TagProfile $resource
 */
class TagProfileResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'          => $this->resource->getName(),
            'description'   => (string)$this->resource->getDescription(),
            'type'          => $this->resource->getType(),
            'variable_name' => $this->resource->getVariableName(),
        ];
    }
}
