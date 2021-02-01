<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Standard;

use SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned as BigUnsigned;

class Unsigned extends BigUnsigned
{
    public static function maxValue(): ?float
    {
        return 4294967295;
    }
}
