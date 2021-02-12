<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Date;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date
 */
class DateTest extends BaseTypeTest
{
    protected static $allowed = [
        self::DATE,
    ];

    public function dataProviderIsNot(): array
    {
        return [
            'valid date #1' => [
                '0001-01-01',
                false,
            ],
            'valid date #2' => [
                '9999-12-31',
                false,
            ],
            'date and time' => [
                '2021-02-21 21:09:27',
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
        $this->assertEquals($expected, Date::isNot($value));
    }
}
