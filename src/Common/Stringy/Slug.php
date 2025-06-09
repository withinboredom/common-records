<?php
namespace Withinboredom\Record\Common\Stringy;

/*
 * This is a generated file. Do not edit. 
 */

readonly class Slug extends \Withinboredom\Record {
	public string $value;
	
	public static function from(string|Slug $value): self {
		if(!$value instanceof self && !preg_match('/^[a-zA-Z0-9-]+$/', $value)) {
			throw new \InvalidArgumentException('Value must be alpha-numeric or hyphen');
		}

		$id ??= $value;
		
		return self::fromClosure($id instanceof self ? $id() : $id, static function() use ($value) {
			$x = new self();
			$x->value = $value;
			return $x;
		});
	}
	
	public function __invoke(): string {
		return $this->value;
	}
	
		public function __toString(): string {
			return $this->value;
		}

		public function toLowercase(string|null $encoding = null): \Withinboredom\Record\Common\Stringy\LowercaseString {
			return \Withinboredom\Record\Common\LowercaseString(\mb_strtolower($this(), $encoding));
		}

		public function toUppercase(string|null $encoding = null): \Withinboredom\Record\Common\Stringy\UppercaseString {
			return \Withinboredom\Record\Common\UppercaseString(\mb_strtoupper($this(), $encoding));
		}

		public function trim(): \Withinboredom\Record\Common\Stringy\TrimmedString {
			return \Withinboredom\Record\Common\TrimmedString(\trim($this()));
		}
}