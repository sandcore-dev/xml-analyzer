<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Big;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger;

class Signed extends BaseInteger
{
    public static function minValue(): ?string
    {
        return '-9223372036854775808';
    }

    public static function maxValue(): ?string
    {
        return '9223372036854775807';
    }
}
