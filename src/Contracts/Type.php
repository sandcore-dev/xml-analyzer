<?php

namespace SandcoreDev\XmlAnalyzer\Contracts;

interface Type
{
    public static function is(string ...$values): bool;

    public static function isNot(string $value): bool;

    public static function hasRange(): bool;

    public static function minValue(): ?string;

    public static function maxValue(): ?string;

    public function __construct(string $value, ?Type $type);

    public function values(): array;
}
