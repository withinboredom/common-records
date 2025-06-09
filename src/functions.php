<?php

namespace Withinboredom\Record\Common;

/*
 * This is a generated file. Do not edit.
 */

use Withinboredom\Record\Common\Numeric\PositiveInt;

/**
 * @param $value positive-int
 * @return PositiveInt
 */
function PositiveInt(int|PositiveInt $value): PositiveInt
{
    return PositiveInt::from($value);
}

use Withinboredom\Record\Common\Numeric\NonNegativeInt;

/**
 * @param $value non-negative-int
 * @return NonNegativeInt
 */
function NonNegativeInt(int|NonNegativeInt $value): NonNegativeInt
{
    return NonNegativeInt::from($value);
}

use Withinboredom\Record\Common\Numeric\NegativeInt;

/**
 * @param $value negative-int
 * @return NegativeInt
 */
function NegativeInt(int|NegativeInt $value): NegativeInt
{
    return NegativeInt::from($value);
}

use Withinboredom\Record\Common\Numeric\NonZeroInt;

/**
 * @param $value non-zero-int
 * @return NonZeroInt
 */
function NonZeroInt(int|NonZeroInt $value): NonZeroInt
{
    return NonZeroInt::from($value);
}

use Withinboredom\Record\Common\Numeric\Percentage;

/**
 * @param $value int<0,100>
 * @return Percentage
 */
function Percentage(int|Percentage $value): Percentage
{
    return Percentage::from($value);
}

use Withinboredom\Record\Common\Numeric\PositiveFloat;

/**
 * @param $value positive-float
 * @return PositiveFloat
 */
function PositiveFloat(float|PositiveFloat $value): PositiveFloat
{
    return PositiveFloat::from($value);
}

use Withinboredom\Record\Common\Numeric\NegativeFloat;

/**
 * @param $value negative-float
 * @return NegativeFloat
 */
function NegativeFloat(float|NegativeFloat $value): NegativeFloat
{
    return NegativeFloat::from($value);
}

use Withinboredom\Record\Common\Numeric\NonZeroFloat;

/**
 * @param $value non-zero-float
 * @return NonZeroFloat
 */
function NonZeroFloat(float|NonZeroFloat $value): NonZeroFloat
{
    return NonZeroFloat::from($value);
}

use Withinboredom\Record\Common\Stringy\NonEmptyString;

/**
 * @param $value non-empty-string
 * @return NonEmptyString
 */
function NonEmptyString(string|NonEmptyString $value): NonEmptyString
{
    return NonEmptyString::from($value);
}

use Withinboredom\Record\Common\Stringy\TrimmedString;

/**
 * @param $value trimmed-string
 * @return TrimmedString
 */
function TrimmedString(string|TrimmedString $value): TrimmedString
{
    return TrimmedString::from($value);
}

use Withinboredom\Record\Common\Stringy\LowercaseString;

/**
 * @param $value lowercase-string
 * @return LowercaseString
 */
function LowercaseString(string|LowercaseString $value): LowercaseString
{
    return LowercaseString::from($value);
}

use Withinboredom\Record\Common\Stringy\UppercaseString;

/**
 * @param $value uppercase-string
 * @return UppercaseString
 */
function UppercaseString(string|UppercaseString $value): UppercaseString
{
    return UppercaseString::from($value);
}

use Withinboredom\Record\Common\Stringy\AlphaString;

/**
 * @param $value alpha-string
 * @return AlphaString
 */
function AlphaString(string|AlphaString $value): AlphaString
{
    return AlphaString::from($value);
}

use Withinboredom\Record\Common\Stringy\AlphaNumericString;

/**
 * @param $value alpha-numeric-string
 * @return AlphaNumericString
 */
function AlphaNumericString(string|AlphaNumericString $value): AlphaNumericString
{
    return AlphaNumericString::from($value);
}

use Withinboredom\Record\Common\Stringy\Slug;

/**
 * @param $value string
 * @return Slug
 */
function Slug(string|Slug $value): Slug
{
    return Slug::from($value);
}

use Withinboredom\Record\Common\Stringy\LiteralString;

/**
 * @param $value literal-string
 * @return LiteralString
 */
function LiteralString(string|LiteralString $value): LiteralString
{
    return LiteralString::from($value);
}

use Withinboredom\Record\Common\Dates\DateTime;

/**
 * @param $value DateTime
 * @return DateTime
 */
function DateTime(\DateTimeImmutable|DateTime|\DateTime|string $value): DateTime
{
    return DateTime::from($value);
}
