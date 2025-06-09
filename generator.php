<?php

use Withinboredom\Record\Common\Numeric\NegativeFloat;
use Withinboredom\Record\Common\Numeric\NegativeInt;
use Withinboredom\Record\Common\Numeric\NonNegativeInt;
use Withinboredom\Record\Common\Numeric\NonZeroFloat;
use Withinboredom\Record\Common\Numeric\Percentage;
use Withinboredom\Record\Common\Numeric\PositiveFloat;
use Withinboredom\Record\Common\Numeric\PositiveInt;
use Withinboredom\Record\Common\Stringy\AlphaNumericString;
use Withinboredom\Record\Common\Stringy\AlphaString;
use Withinboredom\Record\Common\Stringy\LiteralString;
use Withinboredom\Record\Common\Stringy\LowercaseString;
use Withinboredom\Record\Common\Stringy\NonEmptyString;
use Withinboredom\Record\Common\Stringy\Slug;
use Withinboredom\Record\Common\Stringy\TrimmedString;
use Withinboredom\Record\Common\Stringy\UppercaseString;

$strings = [
    'extra' => <<<PHP
public function __toString(): string {
	return \$this->value;
}
 
public function toLowercase(string|null \$encoding = null): \Withinboredom\Record\Common\Stringy\LowercaseString {
	return \Withinboredom\Record\Common\LowercaseString(\mb_strtolower(\$this(), \$encoding));
}
 
public function toUppercase(string|null \$encoding = null): \Withinboredom\Record\Common\Stringy\UppercaseString {
	return \Withinboredom\Record\Common\UppercaseString(\mb_strtoupper(\$this(), \$encoding));
}
 
public function trim(): \Withinboredom\Record\Common\Stringy\TrimmedString {
	return \Withinboredom\Record\Common\TrimmedString(\\trim(\$this()));
}
PHP,
    'baseType' => 'string',
    'acceptsSelf' => true,
];

$scalars = [
    'Numeric' => [
        'PositiveInt' => [
            'baseType' => 'int',
            'acceptsSelf' => true,
            'doctype' => ['positive-int', PositiveInt::class, Percentage::class],
            'accepts' => [Percentage::class],
            'rule' => <<<PHP
		if(\$value instanceof \Withinboredom\Record\Common\Numeric\Percentage) {
			\$value = \$value();
		}
		
		if(!\$value instanceof self && \$value < 1) {
			throw new \InvalidArgumentException('Value must be positive');
		}
PHP,
            'extra' => '',
            'tests' => [
                'pass' => [
                    1,
                    2,
                    3,
                    '\Withinboredom\Record\Common\Percentage(40)',
                    '\Withinboredom\Record\Common\PositiveInt(50)',
                ],
                'fail' => [0, -1, -2],
            ],
        ],
        'NonNegativeInt' => [
            'baseType' => 'int',
            'acceptsSelf' => true,
            'accepts' => [PositiveInt::class],
            'doctype' => 'non-negative-int|NonNegativeInt|PositiveInt',
            'rule' => <<<PHP
		if(\$value instanceof \Withinboredom\Record\Common\Numeric\PositiveInt) {
			\$value = \$value();
		}
		
		if(!\$value instanceof self && \$value < 0) {
			throw new \InvalidArgumentException('Value must be non-negative');
		}
PHP,
            'extra' => '',
            'tests' => [
                'pass' => [
                    1,
                    2,
                    3,
                    0,
                    '\Withinboredom\Record\Common\PositiveInt(50)',
                ],
                'fail' => [-1, -2],
            ],
        ],
        'NegativeInt' => [
            'baseType' => 'int',
            'acceptsSelf' => true,
            'doctype' => 'negative-int|NegativeInt',
            'extra' => '',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value >= 0) {
			throw new \InvalidArgumentException('Value must be negative');
		}
PHP,
            'tests' => [
                'pass' => [-1, -2, -3],
                'fail' => [0, 1, 2],
            ],
        ],
        'NonZeroInt' => [
            'baseType' => 'int',
            'acceptsSelf' => true,
            'doctype' => 'non-zero-int|NonZeroInt|NegativeInt|NonNegativeInt|PositiveInt|Percentage',
            'accepts' => [NegativeInt::class, NonNegativeInt::class, PositiveInt::class, Percentage::class],
            'extra' => '',
            'rule' => <<<PHP
		if(!is_int(\$value) && !\$value instanceof self) {
			\$value = \$value();
		}
		if(!\$value instanceof self && \$value === 0) {
			throw new \InvalidArgumentException('Value must not be zero');
		}
PHP,
            'tests' => [
                'pass' => [
                    1,
                    -2,
                    3,
                    '\Withinboredom\Record\Common\NonZeroInt(40)',
                    '\Withinboredom\Record\Common\Percentage(50)',
                    '\Withinboredom\Record\Common\PositiveInt(60)',
                ],
                'fail' => [0],
            ],
        ],
        'Percentage' => [
            'baseType' => 'int',
            'acceptsSelf' => true,
            'doctype' => 'int<0,100>|Percentage',
            'extra' => '',
            'tests' => [
                'pass' => [0, 100, 50],
                'fail' => [-1, 101],
            ],
            'accepts' => [PositiveInt::class],
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value < 0 || \$value > 100) {
			throw new \InvalidArgumentException('Value must be between 0 and 100');
		}
PHP,
        ],
        'PositiveFloat' => [
            'baseType' => 'float',
            'acceptsSelf' => true,
            'doctype' => 'positive-float|PositiveFloat',
            'extra' => '',
            'tests' => [
                'pass' => [1.0, 2.0, 3.0],
                'fail' => [0.0, -1.0, -2.0],
            ],
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value < 1) {
			throw new \InvalidArgumentException('Value must be positive');
		}
PHP,
        ],
        'NegativeFloat' => [
            'baseType' => 'float',
            'acceptsSelf' => true,
            'doctype' => ['float', NegativeFloat::class],
            'extra' => '',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value >= 0.0) {
			throw new \InvalidArgumentException('Value must be negative');
		}
PHP,
            'tests' => [
                'pass' => [-1.0, -2.0, -3.0],
                'fail' => [0.0, 1.0, 2.0],
            ],
        ],
        'NonZeroFloat' => [
            'baseType' => 'float',
            'acceptsSelf' => true,
            'doctype' => ['float', NonZeroFloat::class, NegativeFloat::class, PositiveFloat::class],
            // 'non-zero-float|NonZeroFloat|NegativeFloat|PositiveFloat',
            'accepts' => [NegativeFloat::class, PositiveFloat::class],
            'extra' => '',
            'rule' => <<<PHP
		if(!\$value instanceof self && !is_float(\$value)) {
			\$value = \$value();
		}

		if(!\$value instanceof self && \$value === 0.0) {
			throw new \InvalidArgumentException('Value must not be zero');
		}
PHP,
            'tests' => [
                'pass' => [1.0, -2.0, 3.0],
                'fail' => [0.0],
            ],
        ],
    ],
    'Stringy' => [
        'NonEmptyString' => [
            ...$strings,
            'doctype' => 'non-empty-string|NonEmptyString|TrimmedString|NonEmptyString|LowercaseString|UppercaseString|AlphaString|AlphaNumericString|Slug|LiteralString',
            'accepts' => [
                TrimmedString::class,
                LowercaseString::class,
                UppercaseString::class,
                AlphaString::class,
                AlphaNumericString::class,
                Slug::class,
                LiteralString::class,
            ],
            'tests' => [
                'pass' => ['a', 'b', 'c'],
                'fail' => [' '],
            ],
            'rule' => <<<PHP
		if(!\$value instanceof self && !is_string(\$value)) {
			\$value = \$value();
		}

		if(!\$value instanceof self && trim(\$value) === '') {
			throw new \InvalidArgumentException('Value must not be empty');
		}
PHP,
        ],
        'TrimmedString' => [
            ...$strings,
            'doctype' => 'trimmed-string|NonEmptyString|TrimmedString|NonEmptyString|LowercaseString|UppercaseString|AlphaString|AlphaNumericString|Slug|LiteralString',
            'accepts' => [
                NonEmptyString::class,
                LowercaseString::class,
                UppercaseString::class,
                AlphaString::class,
                AlphaNumericString::class,
                Slug::class,
                LiteralString::class,
            ],
            'rule' => <<<PHP
		if(!\$value instanceof self && !is_string(\$value)) {
			\$value = \$value();
		}
		
		if(!\$value instanceof self && trim(\$value) !== \$value) {
			throw new \InvalidArgumentException('Value must be trimmed');
		}
PHP,
            'tests' => [
                'pass' => ['a', 'b', 'c'],
                'fail' => [' wicked', 'stuff '],
            ],
        ],
        'LowercaseString' => [
            ...$strings,
            'doctype' => 'lowercase-string|NonEmptyString|TrimmedString|LowercaseString|NonEmptyString|UppercaseString|AlphaString|AlphaNumericString|Slug|LiteralString',
            'accepts' => [
                NonEmptyString::class,
                TrimmedString::class,
                UppercaseString::class,
                AlphaString::class,
                AlphaNumericString::class,
                Slug::class,
                LiteralString::class,
            ],
            'rule' => <<<PHP
		if(!\$value instanceof self && !is_string(\$value)) {
			\$value = \$value();
		}
		
		if(!\$value instanceof self && strtolower(\$value) !== \$value) {
			throw new \InvalidArgumentException('Value must be lowercase');
		}
PHP,
            'tests' => [
                'pass' => ['a', 'b', 'c'],
                'fail' => ['A', 'B', 'C'],
            ],
        ],
        'UppercaseString' => [
            ...$strings,
            'doctype' => 'uppercase-string|NonEmptyString|TrimmedString|LowercaseString|UppercaseString|NonEmptyString|AlphaString|AlphaNumericString|Slug|LiteralString',
            'accepts' => [
                NonEmptyString::class,
                TrimmedString::class,
                LowercaseString::class,
                AlphaString::class,
                AlphaNumericString::class,
                Slug::class,
                LiteralString::class,
            ],
            'rule' => <<<PHP
		if(!\$value instanceof self && !is_string(\$value)) {
			\$value = \$value();
		}
		
		if(!\$value instanceof self && strtoupper(\$value) !== \$value) {
			throw new \InvalidArgumentException('Value must be uppercase');
		}
PHP,
            'tests' => [
                'pass' => ['A', 'B', 'C'],
                'fail' => ['a', 'b', 'c'],
            ],
        ],
        'AlphaString' => [
            ...$strings,
            'doctype' => 'alpha-string|NonEmptyString|TrimmedString|LowercaseString|UppercaseString|AlphaString|NonEmptyString|AlphaNumericString|Slug|LiteralString',
            'accepts' => [
                NonEmptyString::class,
                TrimmedString::class,
                LowercaseString::class,
                UppercaseString::class,
                AlphaNumericString::class,
                Slug::class,
                LiteralString::class,
            ],
            'rule' => <<<PHP
		if(!\$value instanceof self && !is_string(\$value)) {
			\$value = \$value();
		}
		
		if(!\$value instanceof self && !preg_match('/^[a-zA-Z]+$/', \$value)) {
			throw new \InvalidArgumentException('Value must be alpha');
		}
PHP,
            'tests' => [
                'pass' => ['a', 'b', 'c'],
                'fail' => ['A1', 'B2', 'C3', '1', '2', '3'],
            ],
        ],
        'AlphaNumericString' => [
            ...$strings,
            'doctype' => 'alpha-numeric-string|NonEmptyString|TrimmedString|LowercaseString|UppercaseString|AlphaString|AlphaNumericString|NonEmptyString|Slug|LiteralString',
            'accepts' => [
                NonEmptyString::class,
                TrimmedString::class,
                LowercaseString::class,
                UppercaseString::class,
                AlphaString::class,
                Slug::class,
                LiteralString::class,
            ],
            'rule' => <<<PHP
		if(!\$value instanceof self && !is_string(\$value)) {
			\$value = \$value();
		}
		
		if(!\$value instanceof self && !preg_match('/^[a-zA-Z0-9]+$/', \$value)) {
			throw new \InvalidArgumentException('Value must be alpha-numeric');
		}
PHP,
            'tests' => [
                'pass' => ['a', 'b', 'c', '1', '2', '3'],
                'fail' => ['@#$', '---'],
            ],
        ],
        'Slug' => [
            ...$strings,
            'doctype' => 'string|NonEmptyString|TrimmedString|LowercaseString|UppercaseString|AlphaString|AlphaNumericString|Slug|LiteralString',
            'accepts' => [
                NonEmptyString::class,
                TrimmedString::class,
                LowercaseString::class,
                UppercaseString::class,
                AlphaString::class,
                AlphaNumericString::class,
                LiteralString::class,
            ],
            'rule' => <<<PHP
		if(!\$value instanceof self && !is_string(\$value)) {
			\$value = \$value();
		}
		
		if(!\$value instanceof self && !preg_match('/^[a-zA-Z0-9-]+$/', \$value)) {
			throw new \InvalidArgumentException('Value must be alpha-numeric or hyphen');
		}
PHP,
            'tests' => [
                'pass' => ['a', 'b', 'c', '1', '2', '3', 'a-b', 'a-b-c'],
                'fail' => ['@#$', 'fine_day'],
            ],
        ],
        'LiteralString' => [
            ...$strings,
            'doctype' => 'literal-string',
            'rule' => '',
            'tests' => [
                'pass' => ['pass'],
                'fail' => false,
            ],
        ],
    ],
    'Dates' => [
        'DateTime' => [
            'baseType' => '\DateTimeImmutable',
            'acceptsSelf' => true,
            'extra' => '',
            'accepts' => ['\DateTime', 'string', NonEmptyString::class],
            'tests' => [
                'pass' => ['2012-01-01', 'new \DateTimeImmutable("2012-01-01")'],
            ],
            'rule' => <<<PHP
		if(\$value instanceof \Withinboredom\Record\Common\Stringy\NonEmptyString) {
			\$value = \$value();
		}
		if(!\$value instanceof self && is_string(\$value)) {
			\$value = new \DateTimeImmutable(\$value);
		}
		if(!\$value instanceof self) {
			\$id = \$value->format('Y-m-d H:i:s.v');
		} else {
			\$id = \$value()->format('Y-m-d H:i:s.v');
		}
PHP,

        ],
    ],
];

$functions = <<<PHP
<?php
namespace Withinboredom\Record\Common;

/*
 * This is a generated file. Do not edit. 
 */

PHP;

foreach ($scalars as $namespace => $types) {
    foreach ($types as $type => $details) {
        $accepts = $details['acceptsSelf'] ? "{$details['baseType']}|{$type}" : $details['baseType'];
        if (isset($details['accepts'])) {
            $accepts .= '|' . implode('|', array_map(function ($x) {
                if (str_contains($x, '\\') && !str_starts_with($x, '\\')) {
                    return "\\$x";
                }
                return $x;
            }, $details['accepts']));
        }

        $doctype = $details['doctype'] ?? $accepts;
        if (is_array($doctype)) {
            $doctype = implode('|', array_map(static function ($x) {
                if (str_contains($x, '\\')) {
                    return "\\$x";
                }
                return $x;
            }, $doctype));
        }

        $template = <<<PHP
<?php
namespace Withinboredom\Record\Common\\$namespace;

/*
 * This is a generated file. Do not edit. 
 */

readonly class {$type} extends \Withinboredom\Record {
	public {$details['baseType']} \$value;
	
	/**
	 * @param \$value {$doctype}
	 * @return self
	 */
	public static function from({$accepts} \$value): self {
{$details['rule']}

		\$id ??= \$value;
		
		return self::fromClosure(\$id instanceof self ? \$id() : \$id, static function() use (\$value) {
			\$x = new self();
			\$x->value = \$value;
			return \$x;
		});
	}
	
	public function __invoke(): {$details['baseType']} {
		return \$this->value;
	}
	
{$details['extra']}
}
PHP;
        file_put_contents("src/Common/{$namespace}/{$type}.php", $template);
        echo "Wrote {$namespace}/{$type}\n";

        $functions .= <<<PHP

use Withinboredom\Record\Common\\$namespace\\$type;

/**
 * @param \$value {$doctype}
 * @return {$type} 
 */
function {$type}({$accepts} \$value): {$type} {
  return {$type}::from(\$value);
}

PHP;

        $tests = <<<PHP
<?php

use function Withinboredom\Record\Common\\$type;


PHP;
        $datasetInjector = static function ($x) {
            if (is_string($x)) {
                if (str_contains($x, '(')) {
                    return $x;
                }
                return "'$x'";
            }
            return $x;
        };

        if (!empty($details['tests']['pass'])) {
            $passes = '[';
            $passes .= implode(',', array_map($datasetInjector, $details['tests']['pass']));
            $passes .= ']';

            $tests .= <<<PHP
test('$type', function(\$value) {
	\$v1 = $type(\$value);
	\$v2 = $type(\$value);
	expect(\$v1)->toBe(\$v2);
})->with($passes);

PHP;
        }

        if (!empty($details['tests']['fail'])) {
            $fails = '[';
            $fails .= implode(',', array_map($datasetInjector, $details['tests']['fail']));
            $fails .= ']';

            $tests .= <<<PHP

test('$type fails', function(\$value) {
	expect(function() use (\$value) {
		$type(\$value);
	})->toThrow(\\InvalidArgumentException::class);
})->with($fails);
PHP;
        }

        file_put_contents("tests/Unit/{$type}Test.php", $tests);
    }
}

file_put_contents('src/functions.php', $functions);
