<?php

namespace SandcoreDev\XmlAnalyzer\Types\Number;

use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Exceptions\TypeMismatchException;

class FloatingPoint extends BaseNumber
{
    public static function is(string $value): bool
    {
        return is_numeric($value);
    }

    /** @codeCoverageIgnore */
    public static function hasRange(): bool
    {
        return false;
    }

    /** @codeCoverageIgnore */
    public static function minValue(): ?float
    {
        return null;
    }

    /** @codeCoverageIgnore */
    public static function maxValue(): ?float
    {
        return null;
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
        if ($type === null || $type instanceof BaseNumber) {
            return;
        }

        throw new TypeMismatchException();
    }

    /** @codeCoverageIgnore */
    public function values(): array
    {
        return [];
    }

    public function randomValue(): string
    {
        return mt_rand() / mt_getrandmax();
    }
}
