<?php

namespace App\Helpers;

class ResponseFormatter
{
    public static function success(string $message, array $data = []): array
    {
        return [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];
    }

    public static function error(string $message, string $errorCode = '', array $errors = []): array
    {
        return [
            'success' => false,
            'message' => $message,
            'error_code' => $errorCode,
            'errors' => $errors
        ];
    }
}
