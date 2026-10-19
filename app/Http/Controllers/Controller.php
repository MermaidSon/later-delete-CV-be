<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public static function Response(bool $success, string $message, int $code, $data = null)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data !== null ? $data : '',
        ], $code);
    }
}
