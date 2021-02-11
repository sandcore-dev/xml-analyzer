<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit;

use DOMDocument;
use Exception;
use Mockery;
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

        //die(print_r(static::$result, true));
    }

    /**
     * @covers ::__construct
     * @covers ::processFile
     * @covers ::analyze
     * @covers ::analyzeAttributes
     * @covers ::analyzeChildNodes
     * @covers ::analyzeTextNode
     * @covers ::analyzeValue
     * @covers ::getResult
     * @covers ::hasOnlyTextNodes
     * @covers \SandcoreDev\XmlAnalyzer\Result::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Result::setAttributes
     * @covers \SandcoreDev\XmlAnalyzer\Result::setChild
     * @covers \SandcoreDev\XmlAnalyzer\Result::setChildren
     * @covers \SandcoreDev\XmlAnalyzer\Result::setType
     * @covers \SandcoreDev\XmlAnalyzer\Types\BaseType::values
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\BaseNumber::hasRange
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Boolean::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Boolean::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\FloatingPoint::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\FloatingPoint::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Small\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Boolean::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Boolean::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Enumeration::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Enumeration::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Name::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\RandomString::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Url::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Url::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::is
     * @throws LoadingException
     */
    public function testProcessFile(): void
    {
        $result = (new XmlAnalyzer())->processFile(__DIR__ . '/Files/Test.xml');

        $this->assertInstanceOf(Result::class, $result);
    }

    /**
     * @covers ::__construct
     * @covers ::processFile
     * @throws LoadingException
     */
    public function testProcessFileException(): void
    {
        $this->expectException(LoadingException::class);

        (new XmlAnalyzer())->processFile(__DIR__ . '/Files/DoesNotExist.xml');
    }

    /**
     * @covers ::__construct
     * @covers ::process
     * @covers ::analyze
     * @covers ::analyzeTextNode
     * @covers ::hasOnlyTextNodes
     * @covers ::analyzeAttributes
     * @covers ::analyzeChildNodes
     * @covers ::analyzeValue
     * @covers ::getResult
     * @covers \SandcoreDev\XmlAnalyzer\Result::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Result::setAttributes
     * @covers \SandcoreDev\XmlAnalyzer\Result::setChild
     * @covers \SandcoreDev\XmlAnalyzer\Result::setChildren
     * @covers \SandcoreDev\XmlAnalyzer\Result::setType
     * @covers \SandcoreDev\XmlAnalyzer\Types\BaseType::values
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\BaseNumber::hasRange
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Boolean::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Boolean::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\FloatingPoint::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\FloatingPoint::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Small\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::minValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned::maxValue
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Boolean::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Boolean::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Enumeration::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Enumeration::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Name::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\RandomString::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Url::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\String\Url::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime::is
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::is
     * @throws LoadingException
     */
    public function testProcess(): void
    {
        $result = (new XmlAnalyzer())->process(file_get_contents(__DIR__ . '/Files/Test.xml'));

        $this->assertEquals($this->getProcessResult(), $result);
    }

    /**
     * @covers ::__construct
     * @covers ::process
     * @throws LoadingException
     */
    public function testProcessException(): void
    {
        $this->expectException(LoadingException::class);
        (new XmlAnalyzer())->process('');
    }

    /**
     * @covers ::__construct
     * @covers ::process
     * @throws LoadingException
     */
    public function testDomDocumentInjection(): void
    {
        $this->expectException(LoadingException::class);

        $domMock = Mockery::mock(DOMDocument::class);
        $domMock->shouldReceive('loadXML')
            ->withArgs(['foo'])
            ->andReturnFalse();

        (new XmlAnalyzer($domMock))->process('foo');
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
     * @coversNothing
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
        $id = "{$subject} {$childName} {$tag}";

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
            $tests["{$id} {$succeedOrFail} {$index}"] = [
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
