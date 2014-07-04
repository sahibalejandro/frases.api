<?php

use Zero\Transform\Transform;

/**
 * Class AuthorsSentencesApiController
 */
class AuthorsSentencesApiController extends \ApiController {

    /**
     * This controller do not use InputValidator
     */
    public function __construct()
    {
        parent::__construct(null);
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function index($id = null)
    {
        $sentences = $this->getResources($id);
        return Response::api(Transform::collection($sentences));
    }

    /**
     * @param null $id
     * @return mixed
     */
    protected function getResources($id = null)
    {
        $sinceId = Input::get('since', 0);
        $author = Author::findOrFail($id);

        return $author->sentences()
            ->with('author', 'tags')
            ->where('id', '>=', $sinceId)
            ->orderBy('id')
            ->limit(Input::get('limit', $this->limit))
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function random($id)
    {
        $author = Author::findOrFail($id);
        $sentence = $author->sentences()
            ->with('author', 'tags')
            ->limit(1)
            ->orderBy(DB::raw('RAND()'))
            ->first();

        return Response::api($sentence->transform());
    }
} 
