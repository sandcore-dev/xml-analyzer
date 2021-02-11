<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Tiny;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned
 */
class UnsignedTest extends BaseTypeTest
{
    protected static $allowed = [
        self::BOOLEAN_NUMBER,
        self::TINY_UNSIGNED_INTEGER,
    ];
}
