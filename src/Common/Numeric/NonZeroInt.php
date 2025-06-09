<?php

namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit.
 */

readonly class NonZeroInt extends \Withinboredom\Record
{
    public int $value;

    /**
     * @param $value non-zero-int|NonZeroInt|NegativeInt|NonNegativeInt|PositiveInt|Percentage
     * @return self
     */
    public static function from(int|NonZeroInt|\Withinboredom\Record\Common\Numeric\NegativeInt|\Withinboredom\Record\Common\Numeric\NonNegativeInt|\Withinboredom\Record\Common\Numeric\PositiveInt|\Withinboredom\Record\Common\Numeric\Percentage $value): self
    {
        if (!is_int($value) && !$value instanceof self) {
            $value = $value();
        }
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

    protected static function deriveIdentity(mixed ...$args): object|array|string|int|float
    {
        $value = $args[0] ?? $args['value'] ?? throw new \InvalidArgumentException('Missing value');

        if (!is_int($value) && !$value instanceof self) {
            $value = $value();
        }
        if (!$value instanceof self && $value === 0) {
            throw new \InvalidArgumentException('Value must not be zero');
        }

        $id ??= $value;
        return $id;
    }

    public function __invoke(): int
    {
        return $this->value;
    }


}
