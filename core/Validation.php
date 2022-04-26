<?php

namespace App\Core;


class Validation
{
    protected bool $error = true;


    public function __construct(array $rules)
    {
        foreach ($rules as $inputName => $inputRules) {
            $formattedRules[$inputName] = explode('|', $inputRules);
            $this->callRule($inputName, $formattedRules[$inputName]);
        }
        return $this;
    }


    protected function callRule(string $inputName, array $inputRules)
    {
        foreach ($inputRules as $rule) {
            $rule = explode(':', $rule);                                //  example:   "minLength:4"
            $args = isset($rule[1]) ? [$inputName, $rule[1]] : [$inputName];
            call_user_func([$this, $rule[0]], ...$args);
        }
    }


    public function isValid(): bool
    {
        return $this->error;
    }


    protected function required(string $key): void
    {
        if (!Request::param($key) && empty(Request::param($key))) {
            $this->error = false;
        }
    }


    protected function numeric(string $key): void
    {
        if (!filter_var(Request::param($key), FILTER_VALIDATE_INT)) {
            $this->error = false;
        }
    }


    protected function string(string $key): void
    {
        if (filter_var(Request::param($key), FILTER_VALIDATE_INT)) {
            $this->error = false;
        }
    }


    protected function minLength(string $key, int $size): void
    {
        if (strlen(Request::param($key)) < $size) {
            $this->error = false;
        }
    }


    protected function email(string $key): void
    {
        if (!filter_var(Request::param($key), FILTER_VALIDATE_EMAIL)) {
            $this->error = false;
        }
    }

}