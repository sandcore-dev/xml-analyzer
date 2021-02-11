<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Medium;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger;

class Signed extends BaseInteger
{
    public static function minValue(): ?string
    {
        return '-8388608';
    }

    public static function maxValue(): ?string
    {
        return '8388607';
    }
}
