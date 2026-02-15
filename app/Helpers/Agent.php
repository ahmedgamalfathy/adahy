<?php

namespace App\Helpers;

/**
 * Dummy Agent class to replace jenssegers/agent
 * This is a temporary solution until the package is installed
 */
class Agent
{
    public function browser()
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    }

    public function platform()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        
        if (stripos($userAgent, 'Windows') !== false) {
            return 'Windows';
        } elseif (stripos($userAgent, 'Mac') !== false) {
            return 'Mac';
        } elseif (stripos($userAgent, 'Linux') !== false) {
            return 'Linux';
        } elseif (stripos($userAgent, 'Android') !== false) {
            return 'Android';
        } elseif (stripos($userAgent, 'iOS') !== false || stripos($userAgent, 'iPhone') !== false) {
            return 'iOS';
        }
        
        return 'Unknown';
    }

    public function device()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        
        if (stripos($userAgent, 'Mobile') !== false || stripos($userAgent, 'Android') !== false) {
            return 'Mobile';
        } elseif (stripos($userAgent, 'Tablet') !== false || stripos($userAgent, 'iPad') !== false) {
            return 'Tablet';
        }
        
        return 'Desktop';
    }
}
