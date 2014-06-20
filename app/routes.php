<?php
/**
 * Resource methods
 */
$methods = ['index', 'show', 'store', 'update', 'destroy'];

/**
 * API v1.0
 */
Route::group(['prefix' => 'v1'], function () use ($methods)
{

    /**
     * Authors resource
     */
    Route::resource('authors', 'AuthorsApiController', ['only' => $methods]);

    /**
     * Tags resource
     */
    Route::resource('tags', 'TagsApiController', ['only' => $methods]);

    /**
     * Sentences resource
     */
    Route::resource('sentences', 'SentencesApiController', ['only' => $methods]);

    /**
     * Sentence votes update
     */
    Route::match(['PUT', 'PATCH'], 'sentences/{id}/vote', 'SentencesApiController@vote');
});
