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
     * @return array
     */
    public function transform()
    {
        // Get related tags and transform them.
        $tags = $this->tags;
        if (!$tags) {
            $tags = [];
        } else {
            $tags = Transform::collection($tags);
        }

        return [
            'id'             => (int)$this->id,
            'author_id'      => (int)$this->author_id,
            'content'        => $this->content,
            'positive_votes' => (int)$this->positive_votes,
            'negative_votes' => (int)$this->negative_votes,
            'tags'           => $tags,
        ];
    }
} 