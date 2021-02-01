<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

use SandcoreDev\XmlAnalyzer\Contracts\Type;

class Boolean extends Enumeration
{
    public static function is(string $value): bool
    {
        return $value === 'true' || $value === 'false';
    }

    /**
     * @noinspection PhpMissingParentConstructorInspection
     * @noinspection PhpUnusedParameterInspection
     * @param string $value
     * @param Type|null $type
     */
    public function __construct(string $value, ?Type $type)
    {
        $this->values = ['true', 'false'];
    }
}
