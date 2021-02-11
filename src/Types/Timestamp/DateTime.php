<?php

namespace SandcoreDev\XmlAnalyzer\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Types\String\RandomString;

class DateTime extends RandomString
{
    public static function isNot(string $value): bool
    {
        return strptime($value, '%F %T') === false
            || !preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $value);
    }
}
