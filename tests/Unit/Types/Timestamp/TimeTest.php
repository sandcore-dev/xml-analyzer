<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Time;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time
 */
class TimeTest extends BaseTypeTest
{
    protected static $allowed = [
        self::TIME,
    ];

    public function dataProviderIsNot(): array
    {
        return [
            'valid time #1' => [
                '00:00:00',
                false,
            ],
            'valid time #2' => [
                '23:59:59',
                false,
            ],
            'date' => [
                '2021-02-21',
                true,
            ],
            'date and time' => [
                '2021-02-21 21:09:27',
                true,
            ],
            'number' => [
                '12345789',
                true,
            ],
            'string' => [
                'foo-bar-baz',
                true,
            ],
        ];
    }

    /**
     * @covers ::isNot
     * @uses \SandcoreDev\XmlAnalyzer\Types\BaseType::__construct
     * @dataProvider dataProviderIsNot
     * @param string $value
     * @param bool $expected
     */
    public function testIsNot(string $value, bool $expected): void
    {
        $this->assertEquals($expected, Time::isNot($value));
    }
}
