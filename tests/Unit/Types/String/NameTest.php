<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\String\Name
 */
class NameTest extends BaseTypeTest
{
    protected static $allowed = [
        self::NAME,
    ];
}
