<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

use SandcoreDev\XmlAnalyzer\Types\BaseType;

class RandomString extends BaseType
{
    /**
     * @codeCoverageIgnore
     * @param string $value
     * @return bool
     */
    public static function isNot(string $value): bool
    {
        return false;
    }
}
