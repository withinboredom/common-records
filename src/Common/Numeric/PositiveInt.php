<?php

namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit.
 */

readonly class PositiveInt extends \Withinboredom\Record
{
    public int $value;

    /**
     * @param $value positive-int|\Withinboredom\Record\Common\Numeric\PositiveInt|\Withinboredom\Record\Common\Numeric\Percentage
     * @return self
     */
    public static function from(int|PositiveInt|\Withinboredom\Record\Common\Numeric\Percentage $value): self
    {
        if ($value instanceof \Withinboredom\Record\Common\Numeric\Percentage) {
            $value = $value();
        }

        if (!$value instanceof self && $value < 1) {
            throw new \InvalidArgumentException('Value must be positive');
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
