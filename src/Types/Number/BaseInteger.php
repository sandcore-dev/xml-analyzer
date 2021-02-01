<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Exceptions\TypeMismatchException;

abstract class BaseInteger extends BaseNumber
{
    public static function is(string $value): bool
    {
        return (sprintf('%d', $value) === $value)
            && $value >= static::minValue()
            && $value <= static::maxValue();
    }

    /**
     * @noinspection PhpMissingParentConstructorInspection
     * @noinspection PhpUnusedParameterInspection
     * @param string $value
     * @param Type|null $type
     * @throws TypeMismatchException
     */
    public function __construct(string $value, ?Type $type)
    {
        if ($type === null) {
            return;
        }

        $minValue = sprintf('%d', $type::minValue());
        $maxValue = sprintf('%d', $type::maxValue());

        if (!static::hasRange() || !static::is($minValue) || !static::is($maxValue)) {
            throw new TypeMismatchException();
        }
    }
}
