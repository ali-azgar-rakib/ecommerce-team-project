<?php

namespace App\Util;



class CustomMessage
{
    public static function customMessage($message, $status)
    {
        return [
            'message' => $message . ' Successfully',
            'status' => $status
        ];
    }
}
