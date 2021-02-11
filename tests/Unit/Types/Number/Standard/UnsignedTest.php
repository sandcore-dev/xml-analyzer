<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Standard;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned
 */
class UnsignedTest extends BaseTypeTest
{
    protected static $allowed = [
        self::BOOLEAN_NUMBER,
        self::TINY_UNSIGNED_INTEGER,
        self::SMALL_UNSIGNED_INTEGER,
        self::MEDIUM_UNSIGNED_INTEGER,
        self::STANDARD_UNSIGNED_INTEGER,
    ];
}
