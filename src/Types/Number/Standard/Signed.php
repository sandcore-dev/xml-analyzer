<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Standard;

use SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed as BigSigned;

class Signed extends BigSigned
{
    public static function minValue(): ?float
    {
        return -2147483648;
    }

    public static function maxValue(): ?float
    {
        return 2147483647;
    }
}
