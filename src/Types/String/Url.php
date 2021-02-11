<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

class Url extends RandomString
{
    public static function isNot(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_URL) === false;
    }
}
