<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

class Enumeration extends RandomString
{
    public static function isNot(string $value): bool
    {
        return is_numeric($value)
            || substr_count($value, ' ') > 1
            || !preg_match('/^[\pL ]+$/u', $value);
    }
}
