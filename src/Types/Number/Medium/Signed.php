<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Medium;

use SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed as StandardSigned;

class Signed extends StandardSigned
{
    public static function minValue(): ?float
    {
        return -8388608;
    }

    public static function maxValue(): ?float
    {
        return 8388607;
    }
}
