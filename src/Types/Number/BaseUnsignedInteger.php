<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

abstract class BaseUnsignedInteger extends BaseInteger
{
    public static function minValue(): ?string
    {
        return '0';
    }
}
