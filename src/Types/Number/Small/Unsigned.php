<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Small;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger;

class Unsigned extends BaseUnsignedInteger
{
    /** @codeCoverageIgnore */
    public static function maxValue(): ?string
    {
        return '65535';
    }
}
