<?php

use function Withinboredom\Record\Common\PositiveInt;

test('PositiveInt', function ($value) {
    $v1 = PositiveInt($value);
    $v2 = PositiveInt($value);
    expect($v1)->toBe($v2);
})->with([1,2,3]);

test('PositiveInt fails', function ($value) {
    expect(function () use ($value) {
        PositiveInt($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([0,-1,-2]);
