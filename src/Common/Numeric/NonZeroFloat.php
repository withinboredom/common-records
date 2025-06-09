<?php

namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit.
 */

readonly class NonZeroFloat extends \Withinboredom\Record
{
    public float $value;

    /**
     * @param $value non-zero-float
     * @return self
     */
    public static function from(float|NonZeroFloat $value): self
    {
        if (!$value instanceof self && $value === 0) {
            throw new \InvalidArgumentException('Value must not be zero');
        }

        $id ??= $value;

        return self::fromClosure($id instanceof self ? $id() : $id, static function () use ($value) {
            $x = new self();
            $x->value = $value;
            return $x;
        });
    }

    public function __invoke(): float
    {
        return $this->value;
    }


}
