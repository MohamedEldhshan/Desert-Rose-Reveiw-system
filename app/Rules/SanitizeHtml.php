<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class SanitizeHtml implements Rule
{
    public function passes($attribute, $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        // Check for potentially dangerous patterns
        $dangerousPatterns = [
            '/<script\b[^>]*>(.*?)<\/script>/is',
            '/<iframe\b[^>]*>(.*?)<\/iframe>/is',
            '/<object\b[^>]*>(.*?)<\/object>/is',
            '/<embed\b[^>]*>/is',
            '/javascript:/i',
            '/on\w+\s*=/i', // onclick, onerror, etc.
            '/data:/i',
            '/vbscript:/i',
        ];

        foreach ($dangerousPatterns as $pattern) {
            if (preg_match($pattern, $value)) {
                Log::warning('Dangerous HTML pattern detected', [
                    'attribute' => $attribute,
                    'pattern' => $pattern,
                ]);
                return false;
            }
        }

        // Check for excessive emoji usage (potential spam)
        $emojiCount = preg_match_all('/[\x{1F600}-\x{1F64F}]|[\x{1F300}-\x{1F5FF}]|[\x{1F680}-\x{1F6FF}]|[\x{1F1E0}-\x{1F1FF}]/u', $value);
        if ($emojiCount > 20) {
            Log::warning('Excessive emoji usage detected', [
                'attribute' => $attribute,
                'emoji_count' => $emojiCount,
            ]);
            return false;
        }

        // Check for control characters (except newlines and tabs)
        if (preg_match('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', $value)) {
            Log::warning('Control characters detected', [
                'attribute' => $attribute,
            ]);
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return 'The :attribute contains invalid content.';
    }
}
