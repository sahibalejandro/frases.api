<?php
use Zero\Validators\SentenceValidator;

/**
 * Class SentencesApiController
 */
class SentencesApiController extends \ApiController {
    /**
     * @var string
     */
    protected $model = 'Sentence';

    /**
     * @param SentenceValidator $validator
     */
    public function __construct(SentenceValidator $validator)
    {
        parent::__construct($validator);
    }
} 