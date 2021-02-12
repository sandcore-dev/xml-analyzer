<?php

namespace SandcoreDev\XmlAnalyzer\Tests\Unit\Types;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use SandcoreDev\XmlAnalyzer\Exceptions\TypeMismatchException;
use SandcoreDev\XmlAnalyzer\Types\BaseType;
use SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed as BigSignedInteger;
use SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned as BigUnsignedInteger;
use SandcoreDev\XmlAnalyzer\Types\Number\Boolean as BooleanNumber;
use SandcoreDev\XmlAnalyzer\Types\Number\FloatingPoint;
use SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed as MediumSignedInteger;
use SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned as MediumUnsignedInteger;
use SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed as SmallSignedInteger;
use SandcoreDev\XmlAnalyzer\Types\Number\Small\Unsigned as SmallUnsignedInteger;
use SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed as StandardSignedInteger;
use SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned as StandardUnsignedInteger;
use SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed as TinySignedInteger;
use SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned as TinyUnsignedInteger;
use SandcoreDev\XmlAnalyzer\Types\String\Boolean as BooleanString;
use SandcoreDev\XmlAnalyzer\Types\String\Enumeration;
use SandcoreDev\XmlAnalyzer\Types\String\Name;
use SandcoreDev\XmlAnalyzer\Types\String\RandomString;
use SandcoreDev\XmlAnalyzer\Types\String\Url;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Date;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime;
use SandcoreDev\XmlAnalyzer\Types\Timestamp\Time;

abstract class BaseTypeTest extends TestCase
{
    protected const BOOLEAN_NUMBER = 'boolean-number';
    protected const TINY_UNSIGNED_INTEGER = 'tiny-unsigned-integer';
    protected const SMALL_UNSIGNED_INTEGER = 'small-unsigned-integer';
    protected const MEDIUM_UNSIGNED_INTEGER = 'medium-unsigned-integer';
    protected const STANDARD_UNSIGNED_INTEGER = 'standard-unsigned-integer';
    protected const BIG_UNSIGNED_INTEGER = 'big-unsigned-integer';
    protected const TINY_SIGNED_INTEGER = 'tiny-signed-integer';
    protected const SMALL_SIGNED_INTEGER = 'small-signed-integer';
    protected const MEDIUM_SIGNED_INTEGER = 'medium-signed-integer';
    protected const STANDARD_SIGNED_INTEGER = 'standard-signed-integer';
    protected const BIG_SIGNED_INTEGER = 'big-signed-integer';
    protected const FLOATING_POINT = 'floating-point';
    protected const BOOLEAN_STRING = 'boolean-string';
    protected const TIME = 'time';
    protected const DATE = 'date';
    protected const DATE_TIME = 'date-time';
    protected const URL = 'url';
    protected const NAME = 'name';
    protected const ENUMERATION = 'enumeration';
    protected const RANDOM_STRING = 'random-string';

    public const UNSIGNED_INTEGER = 'unsigned-integer';
    public const SIGNED_INTEGER = 'signed-integer';
    public const INTEGER = 'integer';
    public const TIMESTAMP = 'timestamp';

    public const ALL = 'all';

    protected static $classAliasGroups = [
        self::UNSIGNED_INTEGER => [
            self::BOOLEAN_NUMBER,
            self::TINY_UNSIGNED_INTEGER,
            self::SMALL_UNSIGNED_INTEGER,
            self::MEDIUM_UNSIGNED_INTEGER,
            self::STANDARD_UNSIGNED_INTEGER,
            self::BIG_UNSIGNED_INTEGER,
        ],

        self::SIGNED_INTEGER => [
            self::TINY_SIGNED_INTEGER,
            self::SMALL_SIGNED_INTEGER,
            self::MEDIUM_SIGNED_INTEGER,
            self::STANDARD_SIGNED_INTEGER,
            self::BIG_SIGNED_INTEGER,
        ],

        self::INTEGER => [
            self::BOOLEAN_NUMBER,
            self::TINY_UNSIGNED_INTEGER,
            self::SMALL_UNSIGNED_INTEGER,
            self::MEDIUM_UNSIGNED_INTEGER,
            self::STANDARD_UNSIGNED_INTEGER,
            self::BIG_UNSIGNED_INTEGER,

            self::TINY_SIGNED_INTEGER,
            self::SMALL_SIGNED_INTEGER,
            self::MEDIUM_SIGNED_INTEGER,
            self::STANDARD_SIGNED_INTEGER,
            self::BIG_SIGNED_INTEGER,
        ],

        self::TIMESTAMP => [
            self::TIME,
            self::DATE,
            self::DATE_TIME,
        ],
    ];

    protected static $classAliases = [
        self::BOOLEAN_NUMBER => [
            BooleanNumber::class,
            ['0', '1'],
        ],
        self::TINY_UNSIGNED_INTEGER => [
            TinyUnsignedInteger::class,
        ],
        self::SMALL_UNSIGNED_INTEGER => [
            SmallUnsignedInteger::class,
        ],
        self::MEDIUM_UNSIGNED_INTEGER => [
            MediumUnsignedInteger::class,
        ],
        self::STANDARD_UNSIGNED_INTEGER => [
            StandardUnsignedInteger::class,
        ],
        self::BIG_UNSIGNED_INTEGER => [
            BigUnsignedInteger::class,
        ],
        self::TINY_SIGNED_INTEGER => [
            TinySignedInteger::class,
        ],
        self::SMALL_SIGNED_INTEGER => [
            SmallSignedInteger::class,
        ],
        self::MEDIUM_SIGNED_INTEGER => [
            MediumSignedInteger::class,
        ],
        self::STANDARD_SIGNED_INTEGER => [
            StandardSignedInteger::class,
        ],
        self::BIG_SIGNED_INTEGER => [
            BigSignedInteger::class,
        ],
        self::FLOATING_POINT => [
            FloatingPoint::class,
        ],
        self::BOOLEAN_STRING => [
            BooleanString::class,
            ['true', 'false'],
        ],
        self::TIME => [
            Time::class,
            ['00:00:00', '23:59:59'],
        ],
        self::DATE => [
            Date::class,
            ['0001-01-01', '9999-12-31'],
        ],
        self::DATE_TIME => [
            DateTime::class,
            ['0000-01-01 00:00:00', '9999-12-31 23:59:59'],
        ],
        self::URL => [
            Url::class,
            ['http://foo.bar', 'https://localhost.localdomain'],
        ],
        self::NAME => [
            Name::class,
            ['Jane Doe', 'John Doe', 'Foo Bar'],
        ],
        self::ENUMERATION => [
            Enumeration::class,
            ['TV Series', 'Movie', 'Documentary'],
        ],
        self::RANDOM_STRING => [
            RandomString::class,
        ],
    ];

    /** @var string[] */
    protected static $alias = [];

    /** @var string[] */
    protected static $allowed = [];

    /** @var string[][] */
    protected static $denied = [];

    /** @var BaseType */
    protected $subject;

    /** @var string */
    protected $subjectClassName;

    /** @var array */
    protected $subjectValues;

    public static function setUpBeforeClass(): void
    {
        if (!empty(static::$alias[static::class])) {
            return;
        }

        static::$alias[static::class] = static::getAlias();

        static::$allowed = static::substituteGroups(static::$allowed);
        static::$denied[static::class] = array_diff(
            array_keys(static::$classAliases),
            static::$allowed
        );

        foreach (static::$classAliases as $key => &$values) {
            if (empty($values[1]) && $values[0]::hasRange()) {
                $values[1] = [
                    $values[0]::minValue(),
                    $values[0]::maxValue(),
                ];
            }

            switch ($key) {
                case self::FLOATING_POINT:
                    $values[1][] = mt_rand() / mt_getrandmax();
                    $values[1][] = mt_rand() / mt_getrandmax();
                    $values[1][] = mt_rand() / mt_getrandmax();
                    break;
                case self::RANDOM_STRING:
                    $values[1][] = random_bytes(16);
                    $values[1][] = random_bytes(16);
                    $values[1][] = random_bytes(16);
                    break;
            }
        }
    }

    public function setUp(): void
    {
        [$className, $values] = static::$classAliases[static::$alias[static::class]];

        $this->subject = new $className($values[0], null);
        $this->subjectClassName = $className;
        $this->subjectValues = $values;
    }

    /**
     * @coversNothing
     */
    public function testValidTest(): void
    {
        $this->assertNotEmpty(static::$allowed, 'There should be at least one alias in the allowed array');
        $this->assertTrue(
            in_array(static::$alias[static::class], static::$allowed),
            "The class alias '" . static::$alias[static::class] . "' should be in the allowed array"
        );
    }

    public function dataProviderValidValues(): array
    {
        static::setUpBeforeClass();
        return static::$classAliases;
    }

    /**
     * @coversNothing
     * @dataProvider dataProviderValidValues
     * @param string $className
     * @param array $values
     */
    public function testValidValues(string $className, array $values): void
    {
        $instance = null;

        foreach ($values as $value) {
            try {
                $instance = new $className($value, $instance);
            } /** @noinspection PhpRedundantCatchClauseInspection */ catch (TypeMismatchException $e) {
                $this->fail("Class {$className} should be able to accept value '{$value}'");
            }
        }

        $this->assertTrue(true);
    }

    public function dataProviderAllowed(): array
    {
        static::setUpBeforeClass();

        $allowed = [];

        foreach (static::$allowed as $alias) {
            $allowed[$alias] = [
                $alias,
            ];
        }

        return $allowed;
    }

    /**
     * @covers ::__construct()
     * @param string $alias
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned::maxValue
     * @dataProvider dataProviderAllowed
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\String\Url::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\String\Name::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\String\Enumeration::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\BaseType::__construct
     * @uses         \SandcoreDev\XmlAnalyzer\Types\String\Boolean::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Small\Unsigned::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Boolean::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned::maxValue
     */
    public function testAllowed(string $alias): void
    {
        $subjectClassName = $this->subjectClassName;
        /** @noinspection PhpUnusedLocalVariableInspection */
        [$className, $values] = static::$classAliases[$alias];

        foreach ($values as $value) {
            try {
                new $subjectClassName($value, null);
            } /** @noinspection PhpRedundantCatchClauseInspection */ catch (TypeMismatchException $e) {
                $this->fail("The class {$subjectClassName} should be able to assimilate the value {$value}.");
            }
        }

        $this->assertTrue(true);
    }

    public function dataProviderDenied(): array
    {
        static::setUpBeforeClass();

        $denied = [];

        foreach (static::$denied[static::class] as $alias) {
            $denied[$alias] = [
                $alias,
            ];
        }

        if (empty($denied)) {
            $this->markTestSkipped('Skipped because it has no denied types');
        }

        return $denied;
    }

    /**
     * @covers ::__construct
     * @param string $alias
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\BaseUnsignedInteger::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Unsigned::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\String\Url::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\String\Name::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\String\Enumeration::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\BaseType::__construct
     * @uses         \SandcoreDev\XmlAnalyzer\Types\String\Boolean::isNot
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Tiny\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Big\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Unsigned::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Standard\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Small\Unsigned::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Small\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Unsigned::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Medium\Signed::minValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Boolean::maxValue
     * @uses         \SandcoreDev\XmlAnalyzer\Types\Number\Big\Unsigned::maxValue
     * @dataProvider dataProviderDenied
     */
    public function testDenied(string $alias): void
    {
        $subjectClassName = $this->subjectClassName;
        /** @noinspection PhpUnusedLocalVariableInspection */
        [$className, $values] = static::$classAliases[$alias];

        $this->expectException(TypeMismatchException::class);

        foreach ($values as $value) {
            new $subjectClassName($value, null);
        }
    }

    /**
     * @covers ::__construct
     * @covers \SandcoreDev\XmlAnalyzer\Types\BaseType::__construct
     * @uses   \SandcoreDev\XmlAnalyzer\Types\Number\BaseInteger::isNot
     * @uses   \SandcoreDev\XmlAnalyzer\Types\Timestamp\Time::isNot
     * @uses   \SandcoreDev\XmlAnalyzer\Types\Timestamp\DateTime::isNot
     * @uses   \SandcoreDev\XmlAnalyzer\Types\Timestamp\Date::isNot
     * @uses   \SandcoreDev\XmlAnalyzer\Types\String\Url::isNot
     * @uses   \SandcoreDev\XmlAnalyzer\Types\String\Name::isNot
     * @uses   \SandcoreDev\XmlAnalyzer\Types\String\Enumeration::isNot
     * @uses   \SandcoreDev\XmlAnalyzer\Types\String\Boolean::isNot
     */
    public function testValues(): void
    {
        $subjectClassName = $this->subjectClassName;
        $subjectValues = $this->subjectValues;
        $instance = null;

        /** @noinspection PhpUnusedLocalVariableInspection */
        foreach ([1, 2] as $dummy) {
            foreach ($subjectValues as $value) {
                $instance = new $subjectClassName($value, $instance);
            }
        }

        $expected = array_merge(
            $subjectValues,
            $subjectValues
        );

        $this->assertEquals($expected, $instance->values());
    }

    protected static function substituteGroups(array $aliases): array
    {
        $substituted = [];

        foreach ($aliases as $alias) {
            if ($alias === self::ALL) {
                return array_keys(static::$classAliases);
            }

            if (isset(static::$classAliasGroups[$alias])) {
                $substituted = array_merge($substituted, static::$classAliasGroups[$alias]);
                continue;
            }

            $substituted[] = $alias;
        }

        return $substituted;
    }

    protected static function getCoversDefaultClass(): ?string
    {
        $docComment = (new ReflectionClass(static::class))->getDocComment();
        if ($docComment === false || strpos($docComment, '@coversDefaultClass') === false) {
            static::fail('Missing @coversDefaultClass');
        }

        if (preg_match('/@coversDefaultClass ([\w\\\]+)/', $docComment, $matches)) {
            return ltrim($matches[1], '\\');
        }

        static::fail('Invalid characters in @coversDefaultClass');
    }

    protected static function getAlias(): string
    {
        $subjectClass = static::getCoversDefaultClass();

        foreach (static::$classAliases as $alias => $values) {
            if ($values[0] === $subjectClass) {
                return $alias;
            }
        }

        static::fail("Could not find alias for class '{$subjectClass}'");
    }
}
