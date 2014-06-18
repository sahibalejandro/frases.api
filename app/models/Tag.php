<?php

/**
 * Class Tag
 */
class Tag extends ApiModel {
    /**
     * @var string
     */
    protected $table = 'tags';
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
} 