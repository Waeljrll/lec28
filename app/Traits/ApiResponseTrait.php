<?php

namespace App\Traits;

trait ApiResponseTrait
{
    public function success($data = null, $message = "success", $code = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            "errors"=>null
        ], $code);
    }

    public function error($message = "error", $code = 400, $errors = [])
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors
        ], $code);
    }

    public function successMessage($message = "success", $code = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message
        ], $code);
    }

    public function successData($data, $code = 200)
    {
        return response()->json([
            'status' => true,
            'data' => $data
        ], $code);
    }
}
