<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Tiny;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned
 */
class UnsignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'tiny-unsigned-integer',
                Unsigned::class,
            ],
        ];
    }
}
