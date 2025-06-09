<?php


use Withinboredom\Record\Common\Stringy\NonEmptyString;

use function Withinboredom\Record\Common\NonEmptyString;

it('can be created from a string', function() {
	$og = 'testing';
	$str = NonEmptyString($og);
	expect($str)
		->toBeInstanceOf(NonEmptyString::class)
		->and($str->value)->toBe($og)
		->and((string)$str)->toBe($og);
});

it('can be created from a non-empty string', function() {
	$str = NonEmptyString('testing');
	$other = NonEmptyString($str);
	expect($str)->toBe($other);
});

it('fails on empty string', function() {
	expect(function() {
		NonEmptyString('');
	})->toThrow(\InvalidArgumentException::class);
});