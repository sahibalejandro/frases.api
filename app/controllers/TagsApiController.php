<?php
use Zero\Validators\TagValidator;

/**
 * Class TagsApiController
 */
class TagsApiController extends \ApiController {
    /**
     * @var string
     */
    protected $model = 'Tag';

    /**
     * @param TagValidator $validator
     */
    public function __construct(TagValidator $validator)
    {
        parent::__construct($validator);
    }
} 