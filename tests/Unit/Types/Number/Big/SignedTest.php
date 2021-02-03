<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Big;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed
 */
class SignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'big-signed-integer',
                Signed::class,
            ],
        ];
    }
}
