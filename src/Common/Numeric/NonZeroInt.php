<?php
namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit. 
 */

readonly class NonZeroInt extends \Withinboredom\Record {
	public int $value;
	
	public static function from(int|NonZeroInt $value): self {
		if(!$value instanceof self && $value === 0) {
			throw new \InvalidArgumentException('Value must not be zero');
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