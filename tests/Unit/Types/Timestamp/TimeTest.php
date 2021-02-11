<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types\Timestamp;

use SandcoreDev\XmlAnalyzer\Tests\Unit\Types\BaseTypeTest;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time
 */
class TimeTest extends BaseTypeTest
{
    protected static $allowed = [
        self::TIME,
    ];
}
