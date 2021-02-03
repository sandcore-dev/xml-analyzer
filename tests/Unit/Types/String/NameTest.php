<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\String\Name;

class NameTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'name',
                Name::class,
            ],
        ];
    }
}
