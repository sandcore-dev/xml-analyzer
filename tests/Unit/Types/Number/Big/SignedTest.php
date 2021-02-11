<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Big;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed
 */
class SignedTest extends BaseTypeTest
{
    protected static $allowed = [
        self::SIGNED_INTEGER,

        self::BOOLEAN_NUMBER,
        self::TINY_UNSIGNED_INTEGER,
        self::MEDIUM_UNSIGNED_INTEGER,
        self::SMALL_UNSIGNED_INTEGER,
        self::STANDARD_UNSIGNED_INTEGER,
    ];
}
