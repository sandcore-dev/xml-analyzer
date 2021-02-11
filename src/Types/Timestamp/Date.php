<?php

namespace SandcoreDev\XmlAnalyzer\Types\Timestamp;

class Date extends DateTime
{
    public static function isNot(string $value): bool
    {
        return strptime($value, '%F') === false
            || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $value);
    }
}
