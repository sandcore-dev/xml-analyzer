<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Big;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger;

class Signed extends BaseInteger
{
    public static function minValue(): ?float
    {
        return PHP_INT_MIN;
    }

    public static function maxValue(): ?float
    {
        return PHP_INT_MAX;
    }
}
