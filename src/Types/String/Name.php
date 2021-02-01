<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

class Name extends Enumeration
{
    public static function is(string $value): bool
    {
        return preg_match('/^[A-Z][a-z]+ ([A-Z]?[a-z]{2,} ?)*$/', $value);
    }
}
