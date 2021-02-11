<?php

namespace SandcoreDev\XmlAnalyzer\Types;

use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Exceptions\TypeMismatchException;

abstract class BaseType implements Type
{
    /** @var array */
    protected $values = [];

    /**
     * @codeCoverageIgnore
     * @param string ...$values
     * @return bool
     */
    public static function is(string ...$values): bool
    {
        foreach ($values as $value) {
            if (static::isNot($value)) {
                return false;
            }
        }

        return true;
    }

    public static function hasRange(): bool
    {
        return false;
    }

    public static function minValue(): ?string
    {
        return null;
    }

    public static function maxValue(): ?string
    {
        return null;
    }

    public function __construct(string $value, ?Type $type)
    {
        if ($type !== null) {
            $this->values = $type->values();
        }

        $this->values[] = $value;

        if (!static::is(...$this->values)) {
            throw new TypeMismatchException();
        }
    }

    public function values(): array
    {
        return $this->values;
    }
}
