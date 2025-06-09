<?php

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
            'doctype' => 'positive-int',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value < 1) {
			throw new \InvalidArgumentException('Value must be positive');
		}
PHP,
            'extra' => '',
        ],
        'NonNegativeInt' => [
            'baseType' => 'int',
            'acceptsSelf' => true,
            'doctype' => 'non-negative-int',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value < 0) {
			throw new \InvalidArgumentException('Value must be non-negative');
		}
PHP,
            'extra' => '',
        ],
        'NegativeInt' => [
            'baseType' => 'int',
            'acceptsSelf' => true,
            'doctype' => 'negative-int',
            'extra' => '',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value > 0) {
			throw new \InvalidArgumentException('Value must be negative');
		}
PHP,
        ],
        'NonZeroInt' => [
            'baseType' => 'int',
            'acceptsSelf' => true,
            'doctype' => 'non-zero-int',
            'extra' => '',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value === 0) {
			throw new \InvalidArgumentException('Value must not be zero');
		}
PHP,
        ],
        'Percentage' => [
            'baseType' => 'int',
            'acceptsSelf' => true,
            'doctype' => 'int<0,100>',
            'extra' => '',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value < 0 || \$value > 100) {
			throw new \InvalidArgumentException('Value must be between 0 and 100');
		}
PHP,
        ],
        'PositiveFloat' => [
            'baseType' => 'float',
            'acceptsSelf' => true,
            'doctype' => 'positive-float',
            'extra' => '',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value < 1) {
			throw new \InvalidArgumentException('Value must be positive');
		}
PHP,
        ],
        'NegativeFloat' => [
            'baseType' => 'float',
            'acceptsSelf' => true,
            'doctype' => 'negative-float',
            'extra' => '',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value > 0) {
			throw new \InvalidArgumentException('Value must be negative');
		}
PHP,
        ],
        'NonZeroFloat' => [
            'baseType' => 'float',
            'acceptsSelf' => true,
            'doctype' => 'non-zero-float',
            'extra' => '',
            'rule' => <<<PHP
		if(!\$value instanceof self && \$value === 0) {
			throw new \InvalidArgumentException('Value must not be zero');
		}
PHP,
        ],
    ],
    'Stringy' => [
        'NonEmptyString' => [
            ...$strings,
            'doctype' => 'non-empty-string',
            'rule' => <<<PHP
		if(!\$value instanceof self && trim(\$value) === '') {
			throw new \InvalidArgumentException('Value must not be empty');
		}
PHP,
        ],
        'TrimmedString' => [
            ...$strings,
            'doctype' => 'trimmed-string',
            'rule' => <<<PHP
		if(!\$value instanceof self && trim(\$value) !== \$value) {
			throw new \InvalidArgumentException('Value must be trimmed');
		}
PHP,
        ],
        'LowercaseString' => [
            ...$strings,
            'doctype' => 'lowercase-string',
            'rule' => <<<PHP
		if(!\$value instanceof self && strtolower(\$value) !== \$value) {
			throw new \InvalidArgumentException('Value must be lowercase');
		}
PHP,
        ],
        'UppercaseString' => [
            ...$strings,
            'doctype' => 'uppercase-string',
            'rule' => <<<PHP
		if(!\$value instanceof self && strtoupper(\$value) !== \$value) {
			throw new \InvalidArgumentException('Value must be uppercase');
		}
PHP,
        ],
        'AlphaString' => [
            ...$strings,
            'doctype' => 'alpha-string',
            'rule' => <<<PHP
		if(!\$value instanceof self && !preg_match('/^[a-zA-Z]+$/', \$value)) {
			throw new \InvalidArgumentException('Value must be alpha');
		}
PHP,
        ],
        'AlphaNumericString' => [
            ...$strings,
            'doctype' => 'alpha-numeric-string',
            'rule' => <<<PHP
		if(!\$value instanceof self && !preg_match('/^[a-zA-Z0-9]+$/', \$value)) {
			throw new \InvalidArgumentException('Value must be alpha-numeric');
		}
PHP,
        ],
        'Slug' => [
            ...$strings,
            'doctype' => 'string',
            'rule' => <<<PHP
		if(!\$value instanceof self && !preg_match('/^[a-zA-Z0-9-]+$/', \$value)) {
			throw new \InvalidArgumentException('Value must be alpha-numeric or hyphen');
		}
PHP,
        ],
        'LiteralString' => [
            ...$strings,
            'doctype' => 'literal-string',
            'rule' => '',
        ],
    ],
    'Dates' => [
        'DateTime' => [
            'baseType' => '\DateTimeImmutable',
            'acceptsSelf' => true,
            'extra' => '',
            'accepts' => ['\DateTime', 'string'],
            'rule' => <<<PHP
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
            $accepts .= '|' . implode('|', $details['accepts']);
        }

        $doctype = $details['doctype'] ?? $type;

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

    }
}

file_put_contents('src/functions.php', $functions);
