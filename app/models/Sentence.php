<?php
use Zero\Transform\Transform;

/**
 * Class Sentence
 */
class Sentence extends ApiModel {
    /**
     * @var string
     */
    protected $table = 'sentences';
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'author_id', 'content'];

    /**
     * Tags related to this sentence
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    /**
     * Author related to this sentence
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('Author');
    }

    /**
     * @return array
     */
    public function transform()
    {
        $transform = [
            'id'             => (int)$this->id,
            'content'        => $this->content,
            'positive_votes' => (int)$this->positive_votes,
            'negative_votes' => (int)$this->negative_votes,

            // To optimize this use eager loading.
            'tags'           => Transform::collection($this->tags),
            'author'         => $this->author->transform(),
        ];

        return $transform;
    }
} 
