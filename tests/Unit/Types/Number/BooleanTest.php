<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Number;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Number\Boolean
 */
class BooleanTest extends BaseTypeTest
{
    protected static $allowed = [
        self::BOOLEAN_NUMBER,
    ];
}
