<?php

namespace Withinboredom\Record\Common;

/*
 * This is a generated file. Do not edit.
 */

use Withinboredom\Record\Common\Numeric\PositiveInt;

/**
 * @param $value positive-int|\Withinboredom\Record\Common\Numeric\PositiveInt|\Withinboredom\Record\Common\Numeric\Percentage
 * @return PositiveInt
 */
function PositiveInt(int|PositiveInt|\Withinboredom\Record\Common\Numeric\Percentage $value): PositiveInt
{
    return PositiveInt::from($value);
}

use Withinboredom\Record\Common\Numeric\NonNegativeInt;

/**
 * @param $value non-negative-int|NonNegativeInt|PositiveInt
 * @return NonNegativeInt
 */
function NonNegativeInt(int|NonNegativeInt|\Withinboredom\Record\Common\Numeric\PositiveInt $value): NonNegativeInt
{
    return NonNegativeInt::from($value);
}

use Withinboredom\Record\Common\Numeric\NegativeInt;

/**
 * @param $value negative-int|NegativeInt
 * @return NegativeInt
 */
function NegativeInt(int|NegativeInt $value): NegativeInt
{
    return NegativeInt::from($value);
}

use Withinboredom\Record\Common\Numeric\NonZeroInt;

/**
 * @param $value non-zero-int|NonZeroInt|NegativeInt|NonNegativeInt|PositiveInt|Percentage
 * @return NonZeroInt
 */
function NonZeroInt(int|NonZeroInt|\Withinboredom\Record\Common\Numeric\NegativeInt|\Withinboredom\Record\Common\Numeric\NonNegativeInt|\Withinboredom\Record\Common\Numeric\PositiveInt|\Withinboredom\Record\Common\Numeric\Percentage $value): NonZeroInt
{
    return NonZeroInt::from($value);
}

use Withinboredom\Record\Common\Numeric\Percentage;

/**
 * @param $value int<0,100>|Percentage
 * @return Percentage
 */
function Percentage(int|Percentage|\Withinboredom\Record\Common\Numeric\PositiveInt $value): Percentage
{
    return Percentage::from($value);
}

use Withinboredom\Record\Common\Numeric\PositiveFloat;

/**
 * @param $value positive-float|PositiveFloat
 * @return PositiveFloat
 */
function PositiveFloat(float|PositiveFloat $value): PositiveFloat
{
    return PositiveFloat::from($value);
}

use Withinboredom\Record\Common\Numeric\NegativeFloat;

/**
 * @param $value float|\Withinboredom\Record\Common\Numeric\NegativeFloat
 * @return NegativeFloat
 */
function NegativeFloat(float|NegativeFloat $value): NegativeFloat
{
    return NegativeFloat::from($value);
}

use Withinboredom\Record\Common\Numeric\NonZeroFloat;

/**
 * @param $value float|\Withinboredom\Record\Common\Numeric\NonZeroFloat|\Withinboredom\Record\Common\Numeric\NegativeFloat|\Withinboredom\Record\Common\Numeric\PositiveFloat
 * @return NonZeroFloat
 */
function NonZeroFloat(float|NonZeroFloat|\Withinboredom\Record\Common\Numeric\NegativeFloat|\Withinboredom\Record\Common\Numeric\PositiveFloat $value): NonZeroFloat
{
    return NonZeroFloat::from($value);
}

use Withinboredom\Record\Common\Stringy\NonEmptyString;

/**
 * @param $value non-empty-string|NonEmptyString|TrimmedString|NonEmptyString|LowercaseString|UppercaseString|AlphaString|AlphaNumericString|Slug|LiteralString
 * @return NonEmptyString
 */
function NonEmptyString(string|NonEmptyString|\Withinboredom\Record\Common\Stringy\TrimmedString|\Withinboredom\Record\Common\Stringy\LowercaseString|\Withinboredom\Record\Common\Stringy\UppercaseString|\Withinboredom\Record\Common\Stringy\AlphaString|\Withinboredom\Record\Common\Stringy\AlphaNumericString|\Withinboredom\Record\Common\Stringy\Slug|\Withinboredom\Record\Common\Stringy\LiteralString $value): NonEmptyString
{
    return NonEmptyString::from($value);
}

use Withinboredom\Record\Common\Stringy\TrimmedString;

/**
 * @param $value string|NonEmptyString|TrimmedString|NonEmptyString|LowercaseString|UppercaseString|AlphaString|AlphaNumericString|Slug|LiteralString
 * @return TrimmedString
 */
function TrimmedString(string|TrimmedString|\Withinboredom\Record\Common\Stringy\NonEmptyString|\Withinboredom\Record\Common\Stringy\LowercaseString|\Withinboredom\Record\Common\Stringy\UppercaseString|\Withinboredom\Record\Common\Stringy\AlphaString|\Withinboredom\Record\Common\Stringy\AlphaNumericString|\Withinboredom\Record\Common\Stringy\Slug|\Withinboredom\Record\Common\Stringy\LiteralString $value): TrimmedString
{
    return TrimmedString::from($value);
}

use Withinboredom\Record\Common\Stringy\LowercaseString;

/**
 * @param $value lowercase-string|NonEmptyString|TrimmedString|LowercaseString|NonEmptyString|UppercaseString|AlphaString|AlphaNumericString|Slug|LiteralString
 * @return LowercaseString
 */
function LowercaseString(string|LowercaseString|\Withinboredom\Record\Common\Stringy\NonEmptyString|\Withinboredom\Record\Common\Stringy\TrimmedString|\Withinboredom\Record\Common\Stringy\UppercaseString|\Withinboredom\Record\Common\Stringy\AlphaString|\Withinboredom\Record\Common\Stringy\AlphaNumericString|\Withinboredom\Record\Common\Stringy\Slug|\Withinboredom\Record\Common\Stringy\LiteralString $value): LowercaseString
{
    return LowercaseString::from($value);
}

use Withinboredom\Record\Common\Stringy\UppercaseString;

/**
 * @param $value string|NonEmptyString|TrimmedString|LowercaseString|UppercaseString|NonEmptyString|AlphaString|AlphaNumericString|Slug|LiteralString
 * @return UppercaseString
 */
function UppercaseString(string|UppercaseString|\Withinboredom\Record\Common\Stringy\NonEmptyString|\Withinboredom\Record\Common\Stringy\TrimmedString|\Withinboredom\Record\Common\Stringy\LowercaseString|\Withinboredom\Record\Common\Stringy\AlphaString|\Withinboredom\Record\Common\Stringy\AlphaNumericString|\Withinboredom\Record\Common\Stringy\Slug|\Withinboredom\Record\Common\Stringy\LiteralString $value): UppercaseString
{
    return UppercaseString::from($value);
}

use Withinboredom\Record\Common\Stringy\AlphaString;

/**
 * @param $value string|NonEmptyString|TrimmedString|LowercaseString|UppercaseString|AlphaString|NonEmptyString|AlphaNumericString|Slug|LiteralString
 * @return AlphaString
 */
function AlphaString(string|AlphaString|\Withinboredom\Record\Common\Stringy\NonEmptyString|\Withinboredom\Record\Common\Stringy\TrimmedString|\Withinboredom\Record\Common\Stringy\LowercaseString|\Withinboredom\Record\Common\Stringy\UppercaseString|\Withinboredom\Record\Common\Stringy\AlphaNumericString|\Withinboredom\Record\Common\Stringy\Slug|\Withinboredom\Record\Common\Stringy\LiteralString $value): AlphaString
{
    return AlphaString::from($value);
}

use Withinboredom\Record\Common\Stringy\AlphaNumericString;

/**
 * @param $value string|NonEmptyString|TrimmedString|LowercaseString|UppercaseString|AlphaString|AlphaNumericString|NonEmptyString|Slug|LiteralString
 * @return AlphaNumericString
 */
function AlphaNumericString(string|AlphaNumericString|\Withinboredom\Record\Common\Stringy\NonEmptyString|\Withinboredom\Record\Common\Stringy\TrimmedString|\Withinboredom\Record\Common\Stringy\LowercaseString|\Withinboredom\Record\Common\Stringy\UppercaseString|\Withinboredom\Record\Common\Stringy\AlphaString|\Withinboredom\Record\Common\Stringy\Slug|\Withinboredom\Record\Common\Stringy\LiteralString $value): AlphaNumericString
{
    return AlphaNumericString::from($value);
}

use Withinboredom\Record\Common\Stringy\Slug;

/**
 * @param $value string|NonEmptyString|TrimmedString|LowercaseString|UppercaseString|AlphaString|AlphaNumericString|Slug|LiteralString
 * @return Slug
 */
function Slug(string|Slug|\Withinboredom\Record\Common\Stringy\NonEmptyString|\Withinboredom\Record\Common\Stringy\TrimmedString|\Withinboredom\Record\Common\Stringy\LowercaseString|\Withinboredom\Record\Common\Stringy\UppercaseString|\Withinboredom\Record\Common\Stringy\AlphaString|\Withinboredom\Record\Common\Stringy\AlphaNumericString|\Withinboredom\Record\Common\Stringy\LiteralString $value): Slug
{
    return Slug::from($value);
}

use Withinboredom\Record\Common\Stringy\LiteralString;

/**
 * @param $value literal-string|\Withinboredom\Record\Common\Stringy\LiteralString
 * @return LiteralString
 */
function LiteralString(string|LiteralString $value): LiteralString
{
    return LiteralString::from($value);
}

use Withinboredom\Record\Common\Dates\DateTime;

/**
 * @param $value \DateTimeImmutable|DateTime|\DateTime|string|\Withinboredom\Record\Common\Stringy\NonEmptyString
 * @return DateTime
 */
function DateTime(\DateTimeImmutable|DateTime|\DateTime|string|\Withinboredom\Record\Common\Stringy\NonEmptyString $value): DateTime
{
    return DateTime::from($value);
}
