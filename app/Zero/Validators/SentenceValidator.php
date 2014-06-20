<?php
namespace Zero\Validators;


/**
 * Class SentenceValidator
 * @package Zero\Validators
 */
/**
 * Class SentenceValidator
 * @package Zero\Validators
 */
class SentenceValidator extends InputValidator {
    /**
     * @var array
     */
    protected $rules = [

        // Rules for store
        'store' => [
            'user_id'   => 'required',
            'author_id' => 'required',
            'content'   => 'required',
            'tags'      => 'required|array|exists:tags,id',
        ],

        // Rules for update
        'update' => [
            'add_tags'     => 'array|exists:tags,id',
            'remove_tags'  => 'array',
        ],

        // Rules for update votes
        'vote' => [
            'positive' => 'required|boolean',
        ],
    ];


    /**
     * @var string
     */
    private $rulesType = 'store';


    /**
     * @return mixed
     */
    protected function getValidationRules()
    {
        return $this->rules[$this->rulesType];
    }


    /**
     * Set the rules type to use in the next call to validate()
     *
     * @param $rulesType
     * @return $this
     */
    public function setValidationRules($rulesType)
    {
        $this->rulesType = $rulesType;
        return $this;
    }
} 