<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class AppBaseController extends Controller
{
    protected $error = ['error' => '', 'error_key' => ''];

    public function sendResponse($data, $with_error = true): JsonResponse
    {
        if ($with_error) {
            $data = array_merge($data, $this->error);
        }

        return response()->json($data);
    }

    public function sendError($error, $error_key, $code = 404): JsonResponse
    {
        $this->error = [
            'error'     => $error,
            'error_key' => $error_key
        ];

        return response()->json($this->error, $code);
    }
}
