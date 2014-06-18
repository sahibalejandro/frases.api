<?php

namespace Zero\Validators;
use Illuminate\Support\MessageBag;

/**
 * Class InputValidationException
 * @package Zero\Validators
 */
class InputValidationException extends \Exception {
    /**
     * @var \Illuminate\Support\MessageBag
     */
    private $errors;

    /**
     * @param string $message
     * @param MessageBag $errors
     */
    public function __construct($message, MessageBag $errors)
    {
        $this->errors = $errors;
        parent::__construct($message);
    }

    /**
     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }
} 