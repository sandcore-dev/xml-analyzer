<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Medium;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned
 */
class UnsignedTest extends BaseTypeTest
{
    protected static $allowed = [
        self::BOOLEAN_NUMBER,
        self::TINY_UNSIGNED_INTEGER,
        self::SMALL_UNSIGNED_INTEGER,
        self::MEDIUM_UNSIGNED_INTEGER,
    ];
}
