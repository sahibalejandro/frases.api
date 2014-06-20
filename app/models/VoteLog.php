<?php

/**
 * Class VoteLog
 */
class VoteLog extends \Eloquent{

    /**
     * @var string
     */
    protected $table = 'votes_log';

    /**
     * @var array
     */
    protected $fillable = ['sentence_id', 'client_ip', 'positive'];

    /**
     * @var bool
     */
    public $timestamps = false;
} 