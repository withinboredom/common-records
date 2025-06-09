<?php
namespace Withinboredom\Record\Common\Stringy;

/*
 * This is a generated file. Do not edit. 
 */

readonly class LowercaseString extends \Withinboredom\Record {
	public string $value;
	
	public static function from(string|LowercaseString $value): self {
		if(!$value instanceof self && strtolower($value) !== $value) {
			throw new \InvalidArgumentException('Value must be lowercase');
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
}