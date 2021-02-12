<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Small;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger;

class Signed extends BaseInteger
{
    /** @codeCoverageIgnore */
    public static function minValue(): ?string
    {
        return '-32768';
    }

    /** @codeCoverageIgnore */
    public static function maxValue(): ?string
    {
        return '32767';
    }
}
