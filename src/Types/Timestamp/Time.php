<?php

namespace SandcoreDev\XmlAnalyzer\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Types\String\RandomString;

class Time extends RandomString
{
    public static function isNot(string $value): bool
    {
        return strptime($value, '%T') === false
            || !preg_match('/^\d{2}:\d{2}:\d{2}$/', $value);
    }
}
