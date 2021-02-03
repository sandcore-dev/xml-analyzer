<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\String\RandomString;

class RandomStringTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'random-string',
                RandomString::class,
            ],
        ];
    }
}
