<?php

namespace Withinboredom\Record\Common\Stringy;

/*
 * This is a generated file. Do not edit.
 */

readonly class NonEmptyString extends \Withinboredom\Record
{
    public string $value;

    /**
     * @param $value non-empty-string
     * @return self
     */
    public static function from(string|NonEmptyString $value): self
    {
        if (!$value instanceof self && trim($value) === '') {
            throw new \InvalidArgumentException('Value must not be empty');
        }

        $id ??= $value;

        return self::fromClosure($id instanceof self ? $id() : $id, static function () use ($value) {
            $x = new self();
            $x->value = $value;
            return $x;
        });
    }

    public function __invoke(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function toLowercase(string|null $encoding = null): \Withinboredom\Record\Common\Stringy\LowercaseString
    {
        return \Withinboredom\Record\Common\LowercaseString(\mb_strtolower($this(), $encoding));
    }

    public function toUppercase(string|null $encoding = null): \Withinboredom\Record\Common\Stringy\UppercaseString
    {
        return \Withinboredom\Record\Common\UppercaseString(\mb_strtoupper($this(), $encoding));
    }

    public function trim(): \Withinboredom\Record\Common\Stringy\TrimmedString
    {
        return \Withinboredom\Record\Common\TrimmedString(\trim($this()));
    }
}
