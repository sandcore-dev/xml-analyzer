<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

class FloatingPoint extends BaseNumber
{
    /**
     * @codeCoverageIgnore
     * @param string $value
     * @return bool
     */
    public static function isNot(string $value): bool
    {
        return !is_numeric($value);
    }

    /** @codeCoverageIgnore */
    public static function hasRange(): bool
    {
        return false;
    }

    /** @codeCoverageIgnore */
    public static function minValue(): ?string
    {
        return null;
    }

    /** @codeCoverageIgnore */
    public static function maxValue(): ?string
    {
        return null;
    }
}
