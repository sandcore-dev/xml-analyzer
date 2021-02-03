<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Small;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed
 */
class SignedTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'small-signed-integer',
                Signed::class,
            ],
        ];
    }
}
