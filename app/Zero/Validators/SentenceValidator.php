<?php
namespace Zero\Validators;


/**
 * Class SentenceValidator
 * @package Zero\Validators
 */
class SentenceValidator extends InputValidator {
    /**
     * @var array
     */
    protected $rules = [
        'user_id'   => 'required',
        'author_id' => 'required',
        'content'   => 'required',
        'tags'      => 'required|array|exists:tags,id',
    ];

    /**
     * Change the rules to apply when update.
     *
     * @return SentenceValidator
     */
    public function changeRulesToUpdate()
    {
        $this->rules = [
            'add_tags'     => 'array|exists:tags,id',
            'remove_tags'  => 'array',
        ];

        return $this;
    }
} 