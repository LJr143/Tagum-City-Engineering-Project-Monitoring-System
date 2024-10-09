<?php
// app/Services/LogService.php

namespace App\Services;

use App\Models\Log;

class LogService
{
    public static function logAction($action, $message, $userId = null): void
    {
        Log::create([
            'action' => $action,
            'message' => $message,
            'user_id' => $userId,
        ]);
    }
}
