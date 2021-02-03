<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Standard;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned
 */
class UnsignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'standard-unsigned-integer',
                Unsigned::class,
            ],
        ];
    }
}
