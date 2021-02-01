<?php

namespace SandcoreDev\XmlAnalyzer\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Types\BaseType;

class DateTime extends BaseType
{
    public static function is(string $value): bool
    {
        return strptime($value, '%F %T') !== false
            && preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $value);
    }

    /** @noinspection PhpUnusedParameterInspection */
    public function __construct(string $value, ?Type $type)
    {
        $this->values = [];
    }
}
