<?php

namespace App;


class AccessHandler
{
    protected static $hierarchy = [
        'admin' => 100,
        'editor' => 50,
        'user' => 0,
    ];

    public static function check($userRole, $requiredRole)
    {
        return static::$hierarchy[$userRole] >= static::$hierarchy[$requiredRole];
    }
}