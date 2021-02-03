<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Tiny;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed
 */
class SignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'tiny-signed-integer',
                Signed::class,
            ],
        ];
    }
}
