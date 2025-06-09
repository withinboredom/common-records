<?php
namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit. 
 */

readonly class NonNegativeInt extends \Withinboredom\Record {
	public int $value;
	
	public static function from(int|NonNegativeInt $value): self {
		if(!$value instanceof self && $value < 0) {
			throw new \InvalidArgumentException('Value must be non-negative');
		}

		$id ??= $value;
		
		return self::fromClosure($id instanceof self ? $id() : $id, static function() use ($value) {
			$x = new self();
			$x->value = $value;
			return $x;
		});
	}
	
	public function __invoke(): int {
		return $this->value;
	}
	
	
}