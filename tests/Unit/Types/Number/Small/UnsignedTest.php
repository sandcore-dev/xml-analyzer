<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Small;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Small\Unsigned;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Small\Unsigned
 */
class UnsignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'small-unsigned-integer',
                Unsigned::class,
            ],
        ];
    }
}
