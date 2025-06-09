<?php
namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit. 
 */

readonly class Percentage extends \Withinboredom\Record {
	public int $value;
	
	public static function from(int|Percentage $value): self {
		if(!$value instanceof self && $value < 0 || $value > 100) {
			throw new \InvalidArgumentException('Value must be between 0 and 100');
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