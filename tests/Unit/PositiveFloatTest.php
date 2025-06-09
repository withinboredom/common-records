<?php

use function Withinboredom\Record\Common\PositiveFloat;

test('PositiveFloat', function ($value) {
    $v1 = PositiveFloat($value);
    $v2 = PositiveFloat($value);
    expect($v1)->toBe($v2);
})->with([1,2,3]);

test('PositiveFloat fails', function ($value) {
    expect(function () use ($value) {
        PositiveFloat($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([0,-1,-2]);
