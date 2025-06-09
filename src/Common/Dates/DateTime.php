<?php

namespace Withinboredom\Record\Common\Dates;

/*
 * This is a generated file. Do not edit.
 */

readonly class DateTime extends \Withinboredom\Record
{
    public \DateTimeImmutable $value;

    /**
     * @param $value \DateTimeImmutable|DateTime|\DateTime|string|\Withinboredom\Record\Common\Stringy\NonEmptyString
     * @return self
     */
    public static function from(\DateTimeImmutable|DateTime|\DateTime|string|\Withinboredom\Record\Common\Stringy\NonEmptyString $value): self
    {
        if ($value instanceof \Withinboredom\Record\Common\Stringy\NonEmptyString) {
            $value = $value();
        }
        if (!$value instanceof self && is_string($value)) {
            $value = new \DateTimeImmutable($value);
        }
        if (!$value instanceof self) {
            $id = $value->format('Y-m-d H:i:s.v');
        } else {
            $id = $value()->format('Y-m-d H:i:s.v');
        }

        $id ??= $value;

        return self::fromClosure($id instanceof self ? $id() : $id, static function () use ($value) {
            $x = new self();
            $x->value = $value;
            return $x;
        });
    }

    public function __invoke(): \DateTimeImmutable
    {
        return $this->value;
    }


}
