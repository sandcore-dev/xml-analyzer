<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Big;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned
 */
class UnsignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'big-unsigned-integer',
                Unsigned::class,
            ],
        ];
    }
}
