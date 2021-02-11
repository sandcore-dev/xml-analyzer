<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

class Name extends RandomString
{
    public static function isNot(string $value): bool
    {
        return !preg_match('/^[A-Z][a-z]+ ([A-Z]?[a-z]{2,} ?)*$/', $value);
    }
}
