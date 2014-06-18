<?php

use Illuminate\Database\QueryException;
use Illuminate\Http\Response as HttpResponse;
use Zero\Validators\InputValidationException;

/**
 * Generic API response
 */
Response::macro('api', function ($data = null, $message = null, $success = true, $code = HttpResponse::HTTP_OK)
{
    return Response::json(compact('success', 'message', 'code', 'data'));
});

/**
 * Query Error response
 */
Response::macro('apiQueryError', function (QueryException $e)
{
    return Response::api(['error' => $e->getMessage()], 'Query Error', false, HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
});

/**
 * Validation Error response
 */
Response::macro('apiValidationError', function (InputValidationException $e)
{
    return Response::api(['errors' => $e->getErrors()], $e->getMessage(), false, HttpResponse::HTTP_BAD_REQUEST);
});

/**
 * Not Found response
 */
Response::macro('apiNotFound', function ()
{
    return Response::api(null, 'Not Found', false, HttpResponse::HTTP_NOT_FOUND);
});