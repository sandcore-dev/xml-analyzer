<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Time;

class TimeTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'time',
                Time::class,
            ],
        ];
    }
}
