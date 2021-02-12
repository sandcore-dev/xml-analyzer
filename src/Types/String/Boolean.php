<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

class Boolean extends Enumeration
{
    public static function isNot(string $value): bool
    {
        return $value !== 'true' && $value !== 'false';
    }
}
