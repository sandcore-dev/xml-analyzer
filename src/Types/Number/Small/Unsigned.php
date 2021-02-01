<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Small;

use SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned as MediumUnsigned;

class Unsigned extends MediumUnsigned
{
    public static function maxValue(): ?float
    {
        return 65535;
    }
}
