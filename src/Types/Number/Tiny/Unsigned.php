<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Tiny;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger;

class Unsigned extends BaseUnsignedInteger
{
    /** @codeCoverageIgnore */
    public static function maxValue(): ?string
    {
        return '255';
    }
}
