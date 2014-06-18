<?php

namespace Zero\Validators;


class TagValidator extends InputValidator {
    protected $rules = [
        'name' => 'required',
    ];
} 