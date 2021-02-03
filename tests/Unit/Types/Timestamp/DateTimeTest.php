<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime;

class DateTimeTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'date-time',
                DateTime::class,
            ],
        ];
    }
}
