<?php

namespace SandcoreDev\XmlAnalyzer;

use SandcoreDev\XmlAnalyzer\Contracts\Type;

class Result
{
    /** @var array */
    protected $result = [];

    protected $children = [];

    public function __construct(array $result)
    {
        $this->result = $result;
    }

    public function getType(): ?Type
    {
        return $this->result['self'] ?? null;
    }

    /** @return Type[] */
    public function getAttributes(): array
    {
        return $this->result['attributes'] ?? [];
    }

    /** @return Result[] */
    public function getChildren(): array
    {
        if (empty($this->result['children'])) {
            return [];
        }

        if (empty($this->children)) {
            $this->children = array_map(
                function (string $name) {
                    return $this->getChild($name);
                },
                array_keys($this->result['children'])
            );
        }

        return $this->children;
    }

    public function __get($name): ?Type
    {
        return $this->getAttribute($name);
    }

    public function getAttribute($name): ?Type
    {
        return $this->result['attributes'][$name] ?? null;
    }

    public function __call(string $name, array $arguments): ?self
    {
        return $this->getChild($name);
    }

    public function getChild(string $name): ?self
    {
        return isset($this->result['children'][$name])
            ? new self($this->result['children'][$name])
            : null;
    }

    public function getData(): array
    {
        return $this->result;
    }
}
