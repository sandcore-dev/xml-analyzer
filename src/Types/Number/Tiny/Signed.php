<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Tiny;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger;

class Signed extends BaseInteger
{
    public static function minValue(): ?string
    {
        return '-128';
    }

    public static function maxValue(): ?string
    {
        return '127';
    }
}
