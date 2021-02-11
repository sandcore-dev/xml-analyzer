<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

use Brick\Math\BigInteger;
use Brick\Math\Exception\MathException;

abstract class BaseInteger extends BaseNumber
{
    public static function isNot(string $value): bool
    {
        if (!is_numeric($value)) {
            return true;
        }

        try {
            $bigInteger = BigInteger::of($value);

            return
                $bigInteger->isLessThan(static::minValue())
                || $bigInteger->isGreaterThan(static::maxValue());
        } catch (MathException $e) {
            return true;
        }
    }
}
