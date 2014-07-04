<?php

use Zero\Transform\Transform;

/**
 * Class TagsSentencesApiController
 */
class TagsSentencesApiController extends \ApiController {

    /**
     * This controller do not use InputValidator
     */
    public function __construct()
    {
        parent::__construct(null);
    }

    /**
     * @param null $tag_id
     * @return mixed
     */
    public function index($tag_id = null)
    {
        $sentences = $this->getResources($tag_id);
        return Response::api(Transform::collection($sentences));
    }

    /**
     * @param null $tag_id
     * @return mixed
     */
    protected function getResources($tag_id = null)
    {
        $sinceId = Input::get('since', 0);
        $tag = Tag::findOrFail($tag_id);

        return $tag->sentences()
            ->with('author', 'tags')
            ->where('sentence_id', '>=', $sinceId)
            ->orderBy('sentence_id')
            ->limit(Input::get('limit', $this->limit))
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function random($id)
    {
        $tag = Tag::findOrFail($id);
        $sentence = $tag->sentences()
            ->with('author', 'tags')
            ->limit(1)
            ->orderBy(DB::raw('RAND()'))
            ->first();

        return Response::api($sentence->transform());
    }
} 
