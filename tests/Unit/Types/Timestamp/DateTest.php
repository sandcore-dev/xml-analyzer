<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date
 */
class DateTest extends BaseTypeTest
{
    protected static $allowed = [
        self::DATE,
    ];
}
