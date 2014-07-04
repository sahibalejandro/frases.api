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
    Route::resource('authors.sentences', 'AuthorsSentencesApiController', ['only' => 'index']);
    Route::get('authors/{authors}/sentences/random', [
        'as' => 'authors.sentences.random',
        'uses' => 'AuthorsSentencesApiController@random',
    ]);

    /**
     * Tags resource
     */
    Route::resource('tags', 'TagsApiController', ['only' => $methods]);
    Route::resource('tags.sentences', 'TagsSentencesApiController', ['only' => 'index']);
    Route::get('tags/{tags}/sentences/random', [
        'as' => 'tags.sentences.random',
        'uses' => 'TagsSentencesApiController@random',
    ]);

    /**
     * Sentences resource
     */
    Route::get('sentences/random', 'SentencesApiController@random');
    Route::resource('sentences', 'SentencesApiController', ['only' => $methods]);

    /**
     * Sentence votes update
     */
    Route::match(['PUT', 'PATCH'], 'sentences/{id}/vote', 'SentencesApiController@vote');
});
