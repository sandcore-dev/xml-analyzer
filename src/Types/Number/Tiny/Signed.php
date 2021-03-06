<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Tiny;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger;

class Signed extends BaseInteger
{
    /** @codeCoverageIgnore */
    public static function minValue(): ?string
    {
        return '-128';
    }

    /** @codeCoverageIgnore */
    public static function maxValue(): ?string
    {
        return '127';
    }
}
