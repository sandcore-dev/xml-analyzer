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
        $this->setType($result['self'] ?? null);
        $this->setAttributes($result['attributes'] ?? []);
        $this->setChildren($result['children'] ?? []);
    }

    public function getType(): ?Type
    {
        return $this->result['self'] ?? null;
    }

    protected function setType(?Type $type): void
    {
        $this->result['self'] = $type;
    }

    /** @return Type[] */
    public function getAttributes(): array
    {
        return $this->result['attributes'] ?? [];
    }

    protected function setAttributes(array $attributes): void
    {
        foreach ($attributes as $name => $type) {
            $this->setAttribute($name, $type);
        }
    }

    /** @return Result[] */
    public function getChildren(): array
    {
        if (empty($this->result['children'])) {
            return [];
        }

        if (empty($this->children)) {
            foreach ($this->result['children'] as $key => $value) {
                $this->children[$key] = $this->getChild($key);
            }
        }

        return $this->children;
    }

    protected function setChildren(array $children): void
    {
        foreach ($children as $name => $result) {
            $this->setChild($name, $result ?? []);
        }
    }

    public function __get(string $name): ?Type
    {
        return $this->getAttribute($name);
    }

    public function getAttribute(string $name): ?Type
    {
        return $this->result['attributes'][$name] ?? null;
    }

    protected function setAttribute(string $name, ?Type $type): void
    {
        $this->result['attributes'] = $this->result['attributes'] ?? [];
        $this->result['attributes'][$name] = $type;
    }

    public function __call(string $name, array $arguments): ?self
    {
        return $this->getChild($name);
    }

    public function getChild(string $name): ?self
    {
        return isset($this->result['children'][$name])
            ? new static($this->result['children'][$name])
            : null;
    }

    protected function setChild(string $name, array $data): void
    {
        $this->result['children'] = $this->result['children'] ?? [];
        $this->result['children'][$name] = $data;
    }
}
