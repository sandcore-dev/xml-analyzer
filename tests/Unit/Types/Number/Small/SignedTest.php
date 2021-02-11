<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Small;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed
 */
class SignedTest extends BaseTypeTest
{
    protected static $allowed = [
        self::BOOLEAN_NUMBER,
        self::TINY_UNSIGNED_INTEGER,

        self::TINY_SIGNED_INTEGER,
        self::SMALL_SIGNED_INTEGER,
    ];
}
