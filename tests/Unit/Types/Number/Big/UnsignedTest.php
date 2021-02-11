<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number\Big;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned
 */
class UnsignedTest extends BaseTypeTest
{
    protected static $allowed = [
        self::UNSIGNED_INTEGER,
    ];
}
