<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase;
use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Exceptions\LoadingException;
use SandcoreDev\XmlAnalyzer\Result;
use SandcoreDev\XmlAnalyzer\Types\Number;
use SandcoreDev\XmlAnalyzer\Types\String\Boolean;
use SandcoreDev\XmlAnalyzer\Types\String\Enumeration;
use SandcoreDev\XmlAnalyzer\Types\String\Name;
use SandcoreDev\XmlAnalyzer\Types\String\RandomString;
use SandcoreDev\XmlAnalyzer\Types\String\Url;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Date;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Time;
use SandcoreDev\XmlAnalyzer\XmlAnalyzer;

/**
 * @coversDefaultClass \SandcoreDev\XmlAnalyzer\XmlAnalyzer
 */
class XmlAnalyzerTest extends TestCase
{
    protected $tagsTypes = [
        'boolean-number' => Number\Boolean::class,
        'tiny-unsigned-integer' => Number\Tiny\Unsigned::class,
        'small-unsigned-integer' => Number\Small\Unsigned::class,
        'medium-unsigned-integer' => Number\Medium\Unsigned::class,
        'standard-unsigned-integer' => Number\Standard\Unsigned::class,
        'big-unsigned-integer' => Number\Big\Unsigned::class,

        'tiny-signed-integer' => Number\Tiny\Signed::class,
        'small-signed-integer' => Number\Small\Signed::class,
        'medium-signed-integer' => Number\Medium\Signed::class,
        'standard-signed-integer' => Number\Standard\Signed::class,
        'big-signed-integer' => Number\Big\Signed::class,

        'floating-point' => Number\FloatingPoint::class,

        'time' => Time::class,
        'date' => Date::class,
        'date-time' => DateTime::class,

        'boolean-string' => Boolean::class,
        'url' => Url::class,
        'name' => Name::class,
        'enumeration' => Enumeration::class,
        'random-string' => RandomString::class,
    ];

    /** @var Result */
    private static $result;

    /**
     * @throws LoadingException
     */
    public static function setUpBeforeClass(): void
    {
        static::$result = (new XmlAnalyzer())->processFile(__DIR__ . '/Files/Test.xml');
    }

    /**
     * @covers ::processFile
     * @throws LoadingException
     */
    public function testProcessFile(): void
    {
        $result = $this->getProcessResult();

        $this->assertInstanceOf(Result::class, $result);
    }

    /**
     * @covers ::process
     * @throws LoadingException
     */
    public function testProcess(): void
    {
        $result = (new XmlAnalyzer())->process(file_get_contents(__DIR__ . '/Files/Test.xml'));

        $this->assertEquals($this->getProcessResult(), $result);
    }

    public function dataProviderTypes(): array
    {
        $data = [];

        foreach ($this->tagsTypes as $tag => $typeClass) {
            foreach (['attribute' => 'foo', 'node' => null] as $childNode => $attributeName) {
                $data += $this->getTests($tag, $tag, $childNode, $attributeName, $typeClass, true);

                foreach ($this->tagsTypes as $failTag => $failTypeClass) {
                    if ($failTag === $tag) {
                        continue;
                    }

                    $data += $this->getTests($tag, $failTag, $childNode, $attributeName, $typeClass, false);
                }
            }
        }

        return $data;
    }

    /**
     * @dataProvider dataProviderTypes
     * @param Type|null $item
     * @param string $className
     * @param bool $isExpected
     */
    public function testTypes(?Type $item, string $className, bool $isExpected): void
    {
        $actualClass = $item === null
            ? null
            : get_class($item);

        if ($isExpected) {
            $this->assertEquals($className, $actualClass);
        } else {
            $this->assertNotEquals($className, $actualClass);
        }
    }

    /**
     * @param string $subject
     * @param string $tag
     * @param string $childName
     * @param string|null $attributeName
     * @param string $className
     * @param bool $isExpected
     * @return array
     * @throws LoadingException
     */
    private function getTests(
        string $subject,
        string $tag,
        string $childName,
        ?string $attributeName,
        string $className,
        bool $isExpected
    ): array {
        $id = "{$childName} ";
        $id .= $subject === $tag
            ? $subject
            : "{$subject} {$tag}";

        $succeedOrFail = $isExpected
            ? 'succeed'
            : 'fail';

        $subjectChild = $this->getProcessResult()
            ->getChild($tag);

        if ($subjectChild === null) {
            throw new Exception("Child {$subject} not found");
        }

        $testNode = $subjectChild->getChild($childName);
        $items = $testNode->getChildren();
        $tests = [];

        if (empty($items)) {
            throw new Exception("No attribute children found for '{$tag}'->'{$childName}'");
        }

        foreach ($items as $index => $item) {
            $tests["{$id} {$succeedOrFail} #{$index}"] = [
                $attributeName === null
                    ? $item->getType()
                    : $item->getAttribute($attributeName),
                $className,
                $isExpected,
            ];
        }

        return $tests;
    }

    /**
     * @return Result
     * @throws LoadingException
     */
    private function getProcessResult(): Result
    {
        if (!isset(static::$result)) {
            static::$result = (new XmlAnalyzer())->processFile(__DIR__ . '/Files/Test.xml');
        }

        return static::$result;
    }
}
