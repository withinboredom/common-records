<?php

use function Withinboredom\Record\Common\NegativeInt;

test('NegativeInt', function ($value) {
    $v1 = NegativeInt($value);
    $v2 = NegativeInt($value);
    expect($v1)->toBe($v2);
})->with([-1,-2,-3]);

test('NegativeInt fails', function ($value) {
    expect(function () use ($value) {
        NegativeInt($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([0,1,2]);
