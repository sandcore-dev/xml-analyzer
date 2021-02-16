<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\String\Name
 */
class NameTest extends BaseTypeTest
{
    protected static $allowed = [
        self::NAME,
    ];

    public function dataProviderIsNot(): array
    {
        return [
            'number' => [
                '13',
                true,
            ],
            'letters and numbers' => [
                'Apollo 13',
                true,
            ],
            'more than one space' => [
                'foo bar baz',
                true,
            ],
            'no alphanumerics' => [
                'foo, bar',
                true,
            ],
            'two uppercase characters in word' => [
                'TV Series',
                true,
            ],
            'unicode' => [
                "Andr\u{00e9} the Giant",
                false,
            ]
        ];
    }

    /**
     * @covers ::isNot
     * @param string $value
     * @param bool $expected
     * @uses         \SandcoreDev\XmlAnalyzer\Types\BaseType::__construct
     * @uses         \SandcoreDev\XmlAnalyzer\Types\String\Boolean::__construct
     * @dataProvider dataProviderIsNot
     */
    public function testIsNot(string $value, bool $expected): void
    {
        $this->assertEquals($expected, $this->subjectClassName::isNot($value));
    }
}
