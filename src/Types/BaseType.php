<?php

namespace SandcoreDev\XmlAnalyzer\Types;

use SandcoreDev\XmlAnalyzer\Contracts\Type;

abstract class BaseType implements Type
{
    /** @var array */
    protected $values = [];

    public static function hasRange(): bool
    {
        return false;
    }

    public static function minValue(): ?float
    {
        return null;
    }

    public static function maxValue(): ?float
    {
        return null;
    }

    public function values(): array
    {
        return $this->values;
    }

    public function randomValue(): string
    {
        return (string)array_rand($this->values, 1);
    }
}
