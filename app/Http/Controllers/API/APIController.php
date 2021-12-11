<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /**
     * @param null $data
     * @param string $message
     * @param int $code
     * 
     * @return JsonResponse
     */
    public function successResponse( string $message = 'OK', $data = null, int $code = 200 ) : JsonResponse
    {
        return response()->json( [
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code );
    }

    /**
     * Error response.
     * @param string $message
     * @param null $errors
     * @param int $code
     * 
     * @return JsonResponse
     */
    public function errorResponse( string $message = 'Error message', $errors = null, int $code = 404 ) : JsonResponse
    {
        return response()->json( [
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $code );
    }
}
