<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

use SandcoreDev\XmlAnalyzer\Contracts\Type;

class Url extends Enumeration
{
    public static function is(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * @noinspection PhpMissingParentConstructorInspection
     * @noinspection PhpUnusedParameterInspection
     * @param string $value
     * @param Type|null $type
     */
    public function __construct(string $value, ?Type $type)
    {
        $this->values = [];
    }
}
