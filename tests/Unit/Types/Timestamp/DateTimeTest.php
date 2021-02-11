<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime
 */
class DateTimeTest extends BaseTypeTest
{
    protected static $allowed = [
        self::DATE_TIME,
    ];
}
