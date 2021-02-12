<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\String\Boolean;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\String\Boolean
 */
class BooleanTest extends BaseTypeTest
{
    protected static $allowed = [
        self::BOOLEAN_STRING,
    ];

    public function dataProviderIsNot(): array
    {
        return [
            'true' => [
                'true',
                false,
            ],
            'false' => [
                'false',
                false,
            ],
            'zero' => [
                '0',
                true,
            ],
            'one' => [
                '1',
                true,
            ],
            'negative one' => [
                '-1',
                true,
            ],
            'string' => [
                'foo',
                true,
            ],
        ];
    }

    /**
     * @covers ::isNot
     * @uses \SandcoreDev\XmlAnalyzer\Types\BaseType::__construct
     * @uses \SandcoreDev\XmlAnalyzer\Types\String\Boolean::__construct
     * @dataProvider dataProviderIsNot
     * @param string $value
     * @param bool $expected
     */
    public function testIsNot(string $value, bool $expected): void
    {
        $this->assertEquals($expected, Boolean::isNot($value));
    }
}
