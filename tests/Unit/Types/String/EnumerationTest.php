<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\String\Enumeration;

class EnumerationTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'enumeration',
                Enumeration::class,
            ],
        ];
    }
}
