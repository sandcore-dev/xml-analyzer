<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\String\Boolean;

class BooleanTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'boolean-string',
                Boolean::class,
            ],
        ];
    }
}
