<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;
use SandcoreDev\XmlAnalyzer\Types\Number\FloatingPoint;

class FloatingPointTest extends BaseTypeTest
{
    public function dataProviderType(): array
    {
        return [
            [
                'floating-point',
                FloatingPoint::class,
            ],
        ];
    }
}
