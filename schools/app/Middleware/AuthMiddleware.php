<?php

namespace App\Middleware;

class AuthMiddleware
{
    public static function check()
    {
        return isset($_SESSION['MM_Username']) && isset($_SESSION['MM_UserGroup']);
    }

    public static function logout()
    {
        // Check if session is active before starting it
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Unset all session variables
        $_SESSION = [];

        // Destroy the session
        session_destroy();

        // Redirect to the home or login page
        header("Location: " . Main_BASE_URL);
        exit();
    }
}

