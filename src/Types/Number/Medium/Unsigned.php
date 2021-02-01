<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Medium;

use SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned as StandardUnsigned;

class Unsigned extends StandardUnsigned
{
    public static function maxValue(): ?float
    {
        return 16777215;
    }
}
