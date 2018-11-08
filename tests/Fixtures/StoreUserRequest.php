<?php

namespace Tests\Fixtures;

class StoreUserRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
        ];
    }
}
