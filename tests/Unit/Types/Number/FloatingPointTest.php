<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\FloatingPoint
 */
class FloatingPointTest extends BaseTypeTest
{
    protected static $allowed = [
        self::INTEGER,
        self::FLOATING_POINT,
    ];
}
