<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Date;

class DateTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'date',
                Date::class,
            ],
        ];
    }
}
