<?php

namespace SandcoreDev\XmlAnalyzer;

use DOMCharacterData;
use DOMDocument;
use DOMElement;
use DOMNodeList;
use SandcoreDev\XmlAnalyzer\Contracts\Type;
use SandcoreDev\XmlAnalyzer\Exceptions\LoadingException;
use SandcoreDev\XmlAnalyzer\Types\Number;
use SandcoreDev\XmlAnalyzer\Types\String\Boolean;
use SandcoreDev\XmlAnalyzer\Types\String\Enumeration;
use SandcoreDev\XmlAnalyzer\Types\String\Name;
use SandcoreDev\XmlAnalyzer\Types\String\RandomString;
use SandcoreDev\XmlAnalyzer\Types\String\Url;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Date;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Time;

class XmlAnalyzer
{
    /** @var array */
    protected $data = [];

    /** @var DOMDocument */
    protected $dom;

    protected $attributeTypes = [
        Number\Boolean::class,
        Number\Tiny\Unsigned::class,
        Number\Small\Unsigned::class,
        Number\Medium\Unsigned::class,
        Number\Standard\Unsigned::class,
        Number\Big\Unsigned::class,

        Number\Tiny\Signed::class,
        Number\Small\Signed::class,
        Number\Medium\Signed::class,
        Number\Standard\Signed::class,
        Number\Big\Signed::class,

        Number\FloatingPoint::class,

        Time::class,
        Date::class,
        DateTime::class,

        Boolean::class,
        Url::class,
        Name::class,
        Enumeration::class,
    ];

    public function __construct(?DOMDocument $document = null)
    {
        if ($document !== null) {
            $this->dom = $document;
            return;
        }

        $this->dom = new DOMDocument('1.0', 'UTF-8');
        $this->dom->preserveWhiteSpace = false;
    }

    public function getResult(): Result
    {
        return new Result(current($this->data));
    }

    public function process(string ...$xmlStrings): Result
    {
        foreach ($xmlStrings as $xmlString) {
            if (!@$this->dom->loadXML($xmlString)) {
                throw new LoadingException();
            }

            $this->analyze($this->dom->documentElement, $this->data);
        }

        return $this->getResult();
    }

    public function processFile(string ...$xmlFilenames): Result
    {
        foreach ($xmlFilenames as $xmlFilename) {
            if (!@$this->dom->load($xmlFilename)) {
                throw new LoadingException();
            }

            $this->analyze($this->dom->documentElement, $this->data);
        }

        return $this->getResult();
    }

    protected function analyze(DOMElement $node, array &$data): void
    {
        $data[$node->nodeName] = $data[$node->nodeName]
            ?? [];

        $this->analyzeTextNode($node, $data[$node->nodeName]);
        $this->analyzeAttributes($node, $data[$node->nodeName]);
        $this->analyzeChildNodes($node, $data[$node->nodeName]);
    }

    protected function analyzeTextNode(DOMElement $element, array &$data): void
    {
        if (!$this->hasOnlyTextNodes($element->childNodes)) {
            return;
        }

        $data['self'] = $this->analyzeValue($element->nodeValue, $data['self'] ?? null);
    }

    protected function hasOnlyTextNodes(DOMNodeList $list): bool
    {
        if (!$list->count()) {
            return false;
        }

        foreach ($list as $item) {
            if (!($item instanceof DOMCharacterData)) {
                return false;
            }
        }

        return true;
    }

    protected function analyzeAttributes(DOMElement $element, array &$data): void
    {
        if (!$element->hasAttributes()) {
            return;
        }

        $data['attributes'] = $data['attributes'] ?? [];

        foreach ($element->attributes as $attribute) {
            $data['attributes'][$attribute->nodeName] = $this->analyzeValue(
                $attribute->nodeValue,
                $data['attributes'][$attribute->nodeName] ?? null
            );
        }
    }

    protected function analyzeChildNodes(DOMElement $element, array &$data): void
    {
        if (!$element->hasChildNodes() || $this->hasOnlyTextNodes($element->childNodes)) {
            return;
        }

        $data['children'] = $data['children'] ?? [];

        foreach ($element->childNodes as $childNode) {
            $this->analyze($childNode, $data['children']);
        }
    }

    protected function analyzeValue(string $value, ?Type $type = null): Type
    {
        /** @var Type $attributeType */
        foreach ($this->attributeTypes as $attributeType) {
            if ($attributeType::is($value)) {
                if ($type === null || $type instanceof $attributeType) {
                    return new $attributeType($value, $type);
                }
            }
        }

        return new RandomString($value, $type);
    }
}
