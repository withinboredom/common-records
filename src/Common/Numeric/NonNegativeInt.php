<?php

namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit.
 */

readonly class NonNegativeInt extends \Withinboredom\Record
{
    public int $value;

    /**
     * @param $value non-negative-int|NonNegativeInt|PositiveInt
     * @return self
     */
    public static function from(int|NonNegativeInt|\Withinboredom\Record\Common\Numeric\PositiveInt $value): self
    {
        if ($value instanceof \Withinboredom\Record\Common\Numeric\PositiveInt) {
            $value = $value();
        }

        if (!$value instanceof self && $value < 0) {
            throw new \InvalidArgumentException('Value must be non-negative');
        }

        $id ??= $value;

        return self::fromClosure($id instanceof self ? $id() : $id, static function () use ($value) {
            $x = new self();
            $x->value = $value;
            return $x;
        });
    }

    public function __invoke(): int
    {
        return $this->value;
    }


}
