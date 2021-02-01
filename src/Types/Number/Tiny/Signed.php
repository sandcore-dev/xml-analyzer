<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Tiny;

use SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed as SmallSigned;

class Signed extends SmallSigned
{
    public static function minValue(): ?float
    {
        return -128;
    }

    public static function maxValue(): ?float
    {
        return 127;
    }
}
