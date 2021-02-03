<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Medium;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed
 */
class SignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'medium-signed-integer',
                Signed::class,
            ],
        ];
    }
}
