<?php
use Zero\Validators\AuthorValidator;

/**
 * Class AuthorsApiController
 */
class AuthorsApiController extends \ApiController {
    /**
     * @var string
     */
    protected $model = 'Author';

    /**
     * @param AuthorValidator $validator
     */
    public function __construct(AuthorValidator $validator)
    {
        parent::__construct($validator);
    }
} 