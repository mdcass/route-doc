<?php

namespace Mdcass\RouteDoc\Profile;

class FieldValidationProfile
{
    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var string
     */
    protected $field;

    /**
     * ValidationRuleProfile constructor.
     * @param string $field
     * @param array|string $rules
     */
    public function __construct(string $field, $rules)
    {
        $this->field = $field;
        $this->rules = is_string($rules) ? explode('|', $rules) : $rules;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return array|string
     */
    public function getRules()
    {
        return $this->rules;
    }
}
