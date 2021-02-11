<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Medium;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger;

class Unsigned extends BaseUnsignedInteger
{
    public static function maxValue(): ?string
    {
        return '16777215';
    }
}
