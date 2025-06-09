<?php

namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit.
 */

readonly class NonZeroFloat extends \Withinboredom\Record
{
    public float $value;

    /**
     * @param $value float|\Withinboredom\Record\Common\Numeric\NonZeroFloat|\Withinboredom\Record\Common\Numeric\NegativeFloat|\Withinboredom\Record\Common\Numeric\PositiveFloat
     * @return self
     */
    public static function from(float|NonZeroFloat|\Withinboredom\Record\Common\Numeric\NegativeFloat|\Withinboredom\Record\Common\Numeric\PositiveFloat $value): self
    {
        if (!$value instanceof self && !is_float($value)) {
            $value = $value();
        }

        if (!$value instanceof self && $value === 0.0) {
            throw new \InvalidArgumentException('Value must not be zero');
        }

        $id ??= $value;

        return self::fromClosure($id instanceof self ? $id() : $id, static function () use ($value) {
            $x = new self();
            $x->value = $value;
            return $x;
        });
    }

    protected static function deriveIdentity(mixed ...$args): object|array|string|int|float
    {
        $value = $args[0] ?? $args['value'] ?? throw new \InvalidArgumentException('Missing value');

        if (!$value instanceof self && !is_float($value)) {
            $value = $value();
        }

        if (!$value instanceof self && $value === 0.0) {
            throw new \InvalidArgumentException('Value must not be zero');
        }

        $id ??= $value;
        return $id;
    }

    public function __invoke(): float
    {
        return $this->value;
    }


}
