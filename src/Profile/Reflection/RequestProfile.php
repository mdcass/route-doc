<?php

namespace Mdcass\RouteDoc\Profile\Reflection;

use Illuminate\Foundation\Http\FormRequest;
use Mdcass\RouteDoc\Profile\FieldValidationProfile;

class RequestProfile extends ClassProfile
{
    protected $subClass = FormRequest::class;

    /**
     * @return array|FieldValidationProfile[]
     */
    public function rules()
    {
        /** @var FormRequest $class */
        $className = $this->getName();
        $class = new $className;

        $rules = $class->rules();

        return array_map(function ($rules, $field) {
            return new FieldValidationProfile($field, $rules);
        }, $rules, array_keys($rules));
    }
}
