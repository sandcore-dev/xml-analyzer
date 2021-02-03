<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use SandcoreDev\XmlAnalyzer\Exceptions\LoadingException;
use SandcoreDev\XmlAnalyzer\XmlAnalyzer;

abstract class BaseTypeTest extends TestCase
{
    abstract public function dataProviderType(): array;

    /**
     * @covers       \SandcoreDev\XmlAnalyzer\Result::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Result::getAttributes
     * @covers       \SandcoreDev\XmlAnalyzer\Result::getChild
     * @covers       \SandcoreDev\XmlAnalyzer\Result::getChildren
     * @covers       \SandcoreDev\XmlAnalyzer\Result::getType
     * @covers       \SandcoreDev\XmlAnalyzer\Result::setAttribute
     * @covers       \SandcoreDev\XmlAnalyzer\Result::setAttributes
     * @covers       \SandcoreDev\XmlAnalyzer\Result::setChild
     * @covers       \SandcoreDev\XmlAnalyzer\Result::setChildren
     * @covers       \SandcoreDev\XmlAnalyzer\Result::setType
     * @covers       \SandcoreDev\XmlAnalyzer\Types\BaseType::values
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::minValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Boolean::is
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Boolean::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\FloatingPoint::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\FloatingPoint::is
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::minValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::minValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Small\Unsigned::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::minValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::minValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned::maxValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\String\Boolean::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Types\String\Boolean::is
     * @covers       \SandcoreDev\XmlAnalyzer\Types\String\Enumeration::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Types\String\Enumeration::is
     * @covers       \SandcoreDev\XmlAnalyzer\Types\String\Name::is
     * @covers       \SandcoreDev\XmlAnalyzer\Types\String\RandomString::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Types\String\Url::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Types\String\Url::is
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date::is
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime::is
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::is
     * @covers       \SandcoreDev\XmlAnalyzer\XmlAnalyzer::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\XmlAnalyzer::analyze
     * @covers       \SandcoreDev\XmlAnalyzer\XmlAnalyzer::analyzeAttributes
     * @covers       \SandcoreDev\XmlAnalyzer\XmlAnalyzer::analyzeChildNodes
     * @covers       \SandcoreDev\XmlAnalyzer\XmlAnalyzer::analyzeTextNode
     * @covers       \SandcoreDev\XmlAnalyzer\XmlAnalyzer::analyzeValue
     * @covers       \SandcoreDev\XmlAnalyzer\XmlAnalyzer::getResult
     * @covers       \SandcoreDev\XmlAnalyzer\XmlAnalyzer::hasOnlyTextNodes
     * @covers       \SandcoreDev\XmlAnalyzer\XmlAnalyzer::processFile
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::__construct
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::is
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\BaseNumber::hasRange
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger::minValue
     * @covers       \SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned::maxValue
     * @dataProvider dataProviderType
     * @param string $childName
     * @param string $expectedClassName
     * @throws LoadingException
     */
    public function testType(string $childName, string $expectedClassName): void
    {
        $results = (new XmlAnalyzer())->processFile(__DIR__ . '/../Files/Test.xml');

        $categories = $results->getChild($childName)
            ->getChildren();

        foreach ($categories as $category => $tests) {
            foreach ($tests->getChildren() as $test) {
                switch ($category) {
                    case 'attribute':
                        foreach ($test->getAttributes() as $attribute) {
                            $this->assertInstanceOf($expectedClassName, $attribute);
                        }
                        break;
                    case 'node':
                        $this->assertInstanceOf($expectedClassName, $test->getType());
                        break;
                }
            }
        }
    }
}
