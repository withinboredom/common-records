<?php

use Withinboredom\Record\Common\Numeric\PositiveInt;

use function Withinboredom\Record\Common\PositiveInt;

it('can be created from an int', function () {
    $og = 5;
    $int = PositiveInt($og);
    expect($int)
        ->toBeInstanceOf(PositiveInt::class)
        ->and($int->value)->toBe($og)
        ->and($int())->toBe($og);
});

it('fails on negative int', function () {
    expect(function () {
        PositiveInt(-1);
    })->toThrow(\InvalidArgumentException::class);
});

it('accepts another positive int', function () {
    $int = PositiveInt(5);
    $other = PositiveInt($int);
    expect($int)->toBe($other);
});
