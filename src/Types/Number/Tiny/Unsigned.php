<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number\Tiny;

use SandcoreDev\XmlAnalyzer\Types\Number\Small\Unsigned as SmallUnsigned;

class Unsigned extends SmallUnsigned
{
    public static function maxValue(): ?float
    {
        return 255;
    }
}
