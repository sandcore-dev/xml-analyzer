<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\String\Enumeration
 */
class EnumerationTest extends BaseTypeTest
{
    protected static $allowed = [
        self::BOOLEAN_STRING,
        self::NAME,
        self::ENUMERATION,
    ];
}
