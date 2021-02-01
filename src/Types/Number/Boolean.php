<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

use SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned as TinyUnsigned;

class Boolean extends TinyUnsigned
{
    public static function is(string $value): bool
    {
        return $value === '0' || $value === '1';
    }

    public static function maxValue(): ?float
    {
        return 1;
    }
}
