<?php
namespace Withinboredom\Record\Common;

/*
 * This is a generated file. Do not edit. 
 */

use Withinboredom\Record\Common\Numeric\PositiveInt;

function PositiveInt(int|PositiveInt $value): PositiveInt {
  return PositiveInt::from($value);
}

use Withinboredom\Record\Common\Numeric\NonNegativeInt;

function NonNegativeInt(int|NonNegativeInt $value): NonNegativeInt {
  return NonNegativeInt::from($value);
}

use Withinboredom\Record\Common\Numeric\NegativeInt;

function NegativeInt(int|NegativeInt $value): NegativeInt {
  return NegativeInt::from($value);
}

use Withinboredom\Record\Common\Numeric\NonZeroInt;

function NonZeroInt(int|NonZeroInt $value): NonZeroInt {
  return NonZeroInt::from($value);
}

use Withinboredom\Record\Common\Numeric\Percentage;

function Percentage(int|Percentage $value): Percentage {
  return Percentage::from($value);
}

use Withinboredom\Record\Common\Numeric\PositiveFloat;

function PositiveFloat(float|PositiveFloat $value): PositiveFloat {
  return PositiveFloat::from($value);
}

use Withinboredom\Record\Common\Numeric\NegativeFloat;

function NegativeFloat(float|NegativeFloat $value): NegativeFloat {
  return NegativeFloat::from($value);
}

use Withinboredom\Record\Common\Numeric\NonZeroFloat;

function NonZeroFloat(float|NonZeroFloat $value): NonZeroFloat {
  return NonZeroFloat::from($value);
}

use Withinboredom\Record\Common\Stringy\NonEmptyString;

function NonEmptyString(string|NonEmptyString $value): NonEmptyString {
  return NonEmptyString::from($value);
}

use Withinboredom\Record\Common\Stringy\TrimmedString;

function TrimmedString(string|TrimmedString $value): TrimmedString {
  return TrimmedString::from($value);
}

use Withinboredom\Record\Common\Stringy\LowercaseString;

function LowercaseString(string|LowercaseString $value): LowercaseString {
  return LowercaseString::from($value);
}

use Withinboredom\Record\Common\Stringy\UppercaseString;

function UppercaseString(string|UppercaseString $value): UppercaseString {
  return UppercaseString::from($value);
}

use Withinboredom\Record\Common\Stringy\AlphaString;

function AlphaString(string|AlphaString $value): AlphaString {
  return AlphaString::from($value);
}

use Withinboredom\Record\Common\Stringy\AlphaNumericString;

function AlphaNumericString(string|AlphaNumericString $value): AlphaNumericString {
  return AlphaNumericString::from($value);
}

use Withinboredom\Record\Common\Stringy\Slug;

function Slug(string|Slug $value): Slug {
  return Slug::from($value);
}

use Withinboredom\Record\Common\Dates\DateTime;

function DateTime(\DateTimeImmutable|DateTime|\DateTime|string $value): DateTime {
  return DateTime::from($value);
}
