<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

use Brick\Math\BigRational;
use Brick\Math\Exception\MathException;
use SandcoreDev\XmlAnalyzer\Types\String\RandomString;

abstract class BaseNumber extends RandomString
{
    public static function isNot(string $value): bool
    {
        try {
            $bigRational = BigRational::of($value);

            return
                $bigRational->isLessThanOrEqualTo(static::minValue())
                || $bigRational->isGreaterThanOrEqualTo(static::maxValue());
        } catch (MathException $e) {
            return true;
        }
    }

    public static function hasRange(): bool
    {
        return true;
    }
}
