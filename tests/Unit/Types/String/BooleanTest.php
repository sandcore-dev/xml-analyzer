<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\String;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\String\Boolean
 */
class BooleanTest extends BaseTypeTest
{
    protected static $allowed = [
        self::BOOLEAN_STRING,
    ];
}
