<?php

use function Withinboredom\Record\Common\NonNegativeInt;

test('NonNegativeInt', function ($value) {
    $v1 = NonNegativeInt($value);
    $v2 = NonNegativeInt($value);
    expect($v1)->toBe($v2);
})->with([1,2,3,0]);

test('NonNegativeInt fails', function ($value) {
    expect(function () use ($value) {
        NonNegativeInt($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([-1,-2]);
