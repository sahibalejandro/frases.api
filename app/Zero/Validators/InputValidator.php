<?php
namespace Zero\Validators;

/**
 * Class InputValidator
 * @package Zero\Validators
 */
abstract class InputValidator {

    /**
     * @var array
     */
    protected $rules = [];
    protected $validation;

    /**
     * @param array $input
     * @throws InputValidationException
     */
    public function validate($input)
    {
        $this->validation = \Validator::make($input, $this->getValidationRules());

        if ($this->validation->fails()) {
            throw new InputValidationException('Validation Error', $this->getValidationErrors());
        }
    }

    /**
     * @return array
     */
    protected function getValidationRules()
    {
        return $this->rules;
    }

    /**
     * @return mixed
     */
    protected function getValidationErrors()
    {
        return $this->validation->errors();
    }
}