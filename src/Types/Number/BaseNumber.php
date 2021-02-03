<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Exceptions\TypeMismatchException;

abstract class BaseNumber implements Type
{
    public static function is(string $value): bool
    {
        return sprintf('%f', $value) === $value
            && $value >= static::minValue()
            && $value <= static::maxValue();
    }

    public static function hasRange(): bool
    {
        return true;
    }

    /** @noinspection PhpUnusedParameterInspection */
    public function __construct(string $value, ?Type $type)
    {
        if ($type === null) {
            return;
        }

        $minValue = rtrim(sprintf('%f', $type::minValue()), '.0');
        $maxValue = rtrim(sprintf('%f', $type::maxValue()), '.0');

        if (!static::hasRange() || !static::is($minValue) || !static::is($maxValue)) {
            throw new TypeMismatchException();
        }
    }

    /** @codeCoverageIgnore */
    public function values(): array
    {
        return [];
    }

    public function randomValue(): string
    {
        return sprintf('%d', mt_rand(static::minValue(), static::maxValue()));
    }
}
