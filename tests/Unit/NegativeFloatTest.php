<?php

use function Withinboredom\Record\Common\NegativeFloat;

test('NegativeFloat', function ($value) {
    $v1 = NegativeFloat($value);
    $v2 = NegativeFloat($value);
    expect($v1)->toBe($v2);
})->with([-1,-2,-3]);

test('NegativeFloat fails', function ($value) {
    expect(function () use ($value) {
        NegativeFloat($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([0,1,2]);
