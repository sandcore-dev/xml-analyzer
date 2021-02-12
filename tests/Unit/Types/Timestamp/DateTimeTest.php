<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime
 */
class DateTimeTest extends BaseTypeTest
{
    protected static $allowed = [
        self::DATE_TIME,
    ];

    public function dataProviderIsNot(): array
    {
        return [
            'valid date-time #1' => [
                '0001-01-01 00:00:00',
                false,
            ],
            'valid date-time #2' => [
                '9999-12-31 23:59:59',
                false,
            ],
            'date' => [
                '2021-02-21',
                true,
            ],
            'time' => [
                '21:09:27',
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
        $this->assertEquals($expected, DateTime::isNot($value));
    }
}
