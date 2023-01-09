<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait APITrait
{
    public function apiResponse($data = [], $status = Response::HTTP_OK, $message = 'Success!') : JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message'=> $message
        ], $status);
    }
}
