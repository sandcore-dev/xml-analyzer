<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Big;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger;

class Unsigned extends BaseUnsignedInteger
{
    /** @codeCoverageIgnore */
    public static function maxValue(): ?string
    {
        return '18446744073709551615';
    }
}
