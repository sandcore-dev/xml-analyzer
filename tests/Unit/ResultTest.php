<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit;

use SandcoreDev\XmlAnalyzer\Result;
use PHPUnit\Framework\TestCase;
use SandcoreDev\XmlAnalyzer\Types\Number\Boolean;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Time;
use TypeError;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\Result
 */
class ResultTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::setType
     * @covers ::getType
     * @covers ::setAttributes
     * @covers ::setChildren
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::__construct
     */
    public function testGetType(): void
    {
        $result = new Result([]);
        $this->assertNull($result->getType());

        $result = new Result(['self' => null]);
        $this->assertNull($result->getType());

        $result = new Result([
            'self' => new Boolean('0', null),
        ]);
        $this->assertInstanceOf(Boolean::class, $result->getType());
    }

    /**
     * @covers ::__construct
     * @covers ::setType
     */
    public function testSetTypeFailure(): void
    {
        $this->expectException(TypeError::class);

        new Result(['self' => 'foo']);
    }

    /**
     * @covers ::__construct
     * @covers ::__get
     * @covers ::getAttributes
     * @covers ::setAttributes
     * @covers ::getAttribute
     * @covers ::setAttribute
     * @covers ::setChildren
     * @covers ::setType
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::__construct
     */
    public function testGetAttributes(): void
    {
        $result = new Result([]);
        $this->assertIsArray($result->getAttributes());
        $this->assertEmpty($result->getAttributes());

        $result = new Result(['attributes' => null]);
        $this->assertIsArray($result->getAttributes());
        $this->assertEmpty($result->getAttributes());

        $result = new Result(['attributes' => ['foo' => null]]);
        $this->assertIsArray($result->getAttributes());
        $this->assertNotEmpty($result->getAttributes());
        $this->assertNull($result->getAttribute('foo'));

        $result = new Result([
            'attributes' => [
                'foo' => new Time('00:00:00', null),
            ],
        ]);
        $this->assertNotEmpty($result->getAttributes());
        $this->assertInstanceOf(Time::class, $result->getAttribute('foo'));
        $this->assertInstanceOf(Time::class, $result->foo);
    }

    /**
     * @covers ::__construct
     * @covers ::setAttribute
     * @covers ::setAttributes
     * @covers ::setType
     */
    public function testSetAttributeFailure(): void
    {
        $this->expectException(TypeError::class);

        new Result(['attributes' => ['foo' => 'bar']]);
    }

    /**
     * @covers ::__construct
     * @covers ::__call
     * @covers ::getChildren
     * @covers ::setChildren
     * @covers ::getChild
     * @covers ::setChild
     * @covers ::setAttributes
     * @covers ::setType
     */
    public function testGetChildren(): void
    {
        $result = new Result([]);
        $this->assertIsArray($result->getChildren());
        $this->assertEmpty($result->getChildren());

        $result = new Result(['children' => null]);
        $this->assertIsArray($result->getChildren());
        $this->assertEmpty($result->getChildren());

        $result = new Result(['children' => ['foo' => null]]);
        $this->assertIsArray($result->getChildren());
        $this->assertNotEmpty($result->getChildren());
        $this->assertInstanceOf(Result::class, $result->getChild('foo'));
        $this->assertInstanceOf(Result::class, $result->getChildren()['foo']);

        $result = new Result([
            'children' => [
                'foo' => [],
            ],
        ]);
        $this->assertNotEmpty($result->getChildren());
        $this->assertInstanceOf(Result::class, $result->getChild('foo'));
        $this->assertInstanceOf(Result::class, $result->getChildren()['foo']);
        /** @noinspection PhpUndefinedMethodInspection */
        $this->assertInstanceOf(Result::class, $result->foo());
    }

    /**
     * @covers ::__construct
     * @covers ::setChild
     * @covers ::setChildren
     * @covers ::setAttributes
     * @covers ::setType
     */
    public function testSetChildFailure(): void
    {
        $this->expectException(TypeError::class);

        new Result(['children' => ['foo' => 'bar']]);
    }
}
