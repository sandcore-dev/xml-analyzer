<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

class Name extends RandomString
{
    public static function isNot(string $value): bool
    {
        return !preg_match('/^\p{Lu}\p{Ll}+( \pL+)* \p{Lu}\p{Ll}+$/u', $value);
    }
}
