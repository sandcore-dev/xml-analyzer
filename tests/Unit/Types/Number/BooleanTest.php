<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Boolean;

class BooleanTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'boolean-number',
                Boolean::class,
            ],
        ];
    }
}
