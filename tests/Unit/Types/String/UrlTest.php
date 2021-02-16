<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\String\Url
 */
class UrlTest extends BaseTypeTest
{
    protected static $allowed = [
        self::URL,
    ];

    public function dataProviderIsNot(): array
    {
        return [
            'only protocol' => [
                'http://',
                true,
            ],
            'only hostname' => [
                'foo.bar',
                true,
            ],
            'full url' => [
                'http://foo.bar',
                false,
            ],
            'full url #2' => [
                'https://foo.bar',
                false,
            ],
            'full url #3' => [
                'https://foo.bar/baz/boo/',
                false,
            ],
            'with query string' => [
                'https://foo.bar/baz/boo/?foo=bar',
                false,
            ],
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
