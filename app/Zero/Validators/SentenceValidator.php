<?php
namespace Zero\Validators;


class SentenceValidator extends InputValidator {
    protected $rules = [
        'user_id'   => 'required',
        'author_id' => 'required',
        'content'   => 'required',
    ];
} 