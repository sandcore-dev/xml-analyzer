<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Medium;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned
 */
class UnsignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'medium-unsigned-integer',
                Unsigned::class,
            ],
        ];
    }
}
