<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Standard;

use SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger;

class Unsigned extends BaseUnsignedInteger
{
    public static function maxValue(): ?string
    {
        return '4294967295';
    }
}
