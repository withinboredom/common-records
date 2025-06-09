<?php

namespace Withinboredom\Record\Common\Stringy;

/*
 * This is a generated file. Do not edit.
 */

readonly class Slug extends \Withinboredom\Record
{
    public string $value;

    /**
     * @param $value string|NonEmptyString|TrimmedString|LowercaseString|UppercaseString|AlphaString|AlphaNumericString|Slug|LiteralString
     * @return self
     */
    public static function from(string|Slug|\Withinboredom\Record\Common\Stringy\NonEmptyString|\Withinboredom\Record\Common\Stringy\TrimmedString|\Withinboredom\Record\Common\Stringy\LowercaseString|\Withinboredom\Record\Common\Stringy\UppercaseString|\Withinboredom\Record\Common\Stringy\AlphaString|\Withinboredom\Record\Common\Stringy\AlphaNumericString|\Withinboredom\Record\Common\Stringy\LiteralString $value): self
    {
        if (!$value instanceof self && !is_string($value)) {
            $value = $value();
        }

        if (!$value instanceof self && !preg_match('/^[a-zA-Z0-9-]+$/', $value)) {
            throw new \InvalidArgumentException('Value must be alpha-numeric or hyphen');
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

        if (!$value instanceof self && !is_string($value)) {
            $value = $value();
        }

        if (!$value instanceof self && !preg_match('/^[a-zA-Z0-9-]+$/', $value)) {
            throw new \InvalidArgumentException('Value must be alpha-numeric or hyphen');
        }

        $id ??= $value;
        return $id;
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
