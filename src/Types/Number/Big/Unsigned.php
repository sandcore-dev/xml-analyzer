<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Big;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger;

class Unsigned extends BaseUnsignedInteger
{
    public static function maxValue(): ?float
    {
        return PHP_INT_MAX;
    }
}
