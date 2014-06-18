<?php

namespace Zero\Validators;


class AuthorValidator extends InputValidator {
    protected $rules = [
        'name' => 'required',
    ];
} 