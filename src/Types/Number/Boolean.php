<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

class Boolean extends BaseUnsignedInteger
{
    /** @codeCoverageIgnore */
    public static function maxValue(): ?string
    {
        return '1';
    }
}
