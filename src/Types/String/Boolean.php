<?php

namespace SandcoreDev\XmlAnalyzer\Types\String;

use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Exceptions\TypeMismatchException;

class Boolean extends Enumeration
{
    public static function isNot(string $value): bool
    {
        return $value !== 'true' && $value !== 'false';
    }

    /**
     * @param string $value
     * @param Type|null $type
     * @throws TypeMismatchException
     */
    public function __construct(string $value, ?Type $type)
    {
        parent::__construct($value, $type);

        $this->values = ['true', 'false'];
    }
}
