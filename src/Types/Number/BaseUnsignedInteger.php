<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

abstract class BaseUnsignedInteger extends BaseInteger
{
    /** @codeCoverageIgnore */
    public static function minValue(): ?string
    {
        return '0';
    }
}
