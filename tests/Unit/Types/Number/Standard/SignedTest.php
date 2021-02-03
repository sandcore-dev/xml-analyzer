<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Standard;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed
 */
class SignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'standard-signed-integer',
                Signed::class,
            ],
        ];
    }
}
