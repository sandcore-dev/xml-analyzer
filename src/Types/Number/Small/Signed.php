<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Small;

use SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed as MediumSigned;

class Signed extends MediumSigned
{
    public static function minValue(): ?float
    {
        return -32768;
    }

    public static function maxValue(): ?float
    {
        return 32767;
    }
}
