<?php

namespace Mdcass\RouteDoc\Profile\Reflection;

class RequestProfile extends ClassProfile
{
    protected $subClass = \Illuminate\Foundation\Http\FormRequest::class;

    public function rules()
    {

    }
}
