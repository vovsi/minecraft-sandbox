<?php

namespace App\Services\Webhook\Player;

class ParserService
{
    /**
     * @param string $source
     * @return string|null
     */
    public static function getUsername(string $source): ?string
    {
        if (preg_match('/^\{.*"content"\s*:\s*"(\S+).*"}$/', $source, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * @param string $source
     * @return string|null
     */
    public static function getStatus(string $source): ?string
    {
        if (preg_match('/"content"\s*:\s*"\S+\s+(joined|left)!"/i', $source, $matches)) {
            return strtolower($matches[1]);
        }

        return null;
    }
}
