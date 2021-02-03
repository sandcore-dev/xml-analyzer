<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Types\BaseType;

class RandomString extends BaseType
{
    /** @var array */
    protected $values;

    public function __construct(string $value, ?Type $type)
    {
        $this->values = $type === null
            ? []
            : $type->values();
        $this->values[] = substr_count($value, ' ') + 1;
    }

    /**
     * @codeCoverageIgnore
     * @param string $value
     * @return bool
     */
    public static function is(string $value): bool
    {
        return true;
    }
}
