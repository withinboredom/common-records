<?php
namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit. 
 */

readonly class NegativeFloat extends \Withinboredom\Record {
	public float $value;
	
	public static function from(float|NegativeFloat $value): self {
		if(!$value instanceof self && $value > 0) {
			throw new \InvalidArgumentException('Value must be negative');
		}

		$id ??= $value;
		
		return self::fromClosure($id instanceof self ? $id() : $id, static function() use ($value) {
			$x = new self();
			$x->value = $value;
			return $x;
		});
	}
	
	public function __invoke(): float {
		return $this->value;
	}
	
	
}