<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Exceptions\TypeMismatchException;

class Enumeration extends RandomString
{
    public static function is(string $value): bool
    {
        return !is_numeric($value)
            && preg_match('/[[:alpha:]]/', $value)
            && substr_count($value, ' ') < 2;
    }

    /** @noinspection PhpMissingParentConstructorInspection */
    public function __construct(string $value, ?Type $type)
    {
        $this->values = [];

        if ($type === null) {
            $this->values[] = $value;
            return;
        }

        if (!static::is($value)) {
            throw new TypeMismatchException();
        }

        $this->values = $type->values();
        $this->values[] = $value;
    }
}
