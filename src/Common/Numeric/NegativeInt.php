<?php

namespace Withinboredom\Record\Common\Numeric;

/*
 * This is a generated file. Do not edit.
 */

readonly class NegativeInt extends \Withinboredom\Record
{
    public int $value;

    /**
     * @param $value negative-int|NegativeInt
     * @return self
     */
    public static function from(int|NegativeInt $value): self
    {
        if (!$value instanceof self && $value >= 0) {
            throw new \InvalidArgumentException('Value must be negative');
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

        if (!$value instanceof self && $value >= 0) {
            throw new \InvalidArgumentException('Value must be negative');
        }

        $id ??= $value;
        return $id;
    }

    public function __invoke(): int
    {
        return $this->value;
    }


}
