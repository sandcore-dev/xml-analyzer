<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\String\Url;

class UrlTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'url',
                Url::class,
            ],
        ];
    }
}
