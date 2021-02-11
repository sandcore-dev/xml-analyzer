<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\String\RandomString
 */
class RandomStringTest extends BaseTypeTest
{
    protected static $allowed = [
        self::ALL,
    ];
}
