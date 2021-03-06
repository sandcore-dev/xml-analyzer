<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Standard;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed
 */
class SignedTest extends BaseTypeTest
{
    protected static $allowed = [
        self::BOOLEAN_NUMBER,
        self::TINY_UNSIGNED_INTEGER,
        self::SMALL_UNSIGNED_INTEGER,
        self::MEDIUM_UNSIGNED_INTEGER,

        self::TINY_SIGNED_INTEGER,
        self::SMALL_SIGNED_INTEGER,
        self::MEDIUM_SIGNED_INTEGER,
        self::STANDARD_SIGNED_INTEGER,
    ];
}
