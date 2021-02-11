<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

class Boolean extends BaseUnsignedInteger
{
    public static function maxValue(): ?string
    {
        return '1';
    }
}
