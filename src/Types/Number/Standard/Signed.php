<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Standard;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger;

class Signed extends BaseInteger
{
    public static function minValue(): ?string
    {
        return '-2147483648';
    }

    public static function maxValue(): ?string
    {
        return '2147483647';
    }
}
