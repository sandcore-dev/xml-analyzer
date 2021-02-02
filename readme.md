# XML Analyzer

Analyze one or more XML strings or files to guess the type and thus the range of values of attributes and node values.

## Examples

```php
$analyzer = new \SandcoreDev\XmlAnalyzer\XmlAnalyzer();

// Analyze one or more XML strings. More data is more accurate. 
$result = $analyzer->process($xmlString, $anotherXmlString, ...$moreXmlStrings);

// Analyze one or more XML files. More data is more accurate.
$result = $analyzer->processFile($xmlFile, $anotherXmlFile, ...$moreXmlFiles);

// Available types are in src/Types/
$result->getType();

$result->getAttributes();
$result->getAttribute('foo');

$result->getChildren();
$child = $result->getChild('bar');

// Each (child) node has the same methods available
$child->getType();
$child->getAttributes();
$child->getChildren();
```
