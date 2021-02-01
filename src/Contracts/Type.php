<?php

namespace SandcoreDev\XmlAnalyzer\Contracts;

interface Type
{
    public static function is(string $value): bool;

    public static function hasRange(): bool;

    public static function minValue(): ?float;

    public static function maxValue(): ?float;

    public function __construct(string $value, ?Type $type);

    public function values(): array;

    public function randomValue(): string;
}
