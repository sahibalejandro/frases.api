<?php

/**
 * Class Author
 */
class Author extends ApiModel {
    /**
     * @var string
     */
    protected $table = 'authors';
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return array
     */
    public function transform()
    {
        return [
            'id'   => (int) $this->id,
            'name' => $this->name,
        ];
    }

    /**
     * Sentences related to this author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sentences()
    {
        return $this->hasMany('Sentence');
    }
} 
