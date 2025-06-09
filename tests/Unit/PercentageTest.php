<?php

use function Withinboredom\Record\Common\Percentage;

test('Percentage', function ($value) {
    $v1 = Percentage($value);
    $v2 = Percentage($value);
    expect($v1)->toBe($v2);
})->with([0,100,50]);

test('Percentage fails', function ($value) {
    expect(function () use ($value) {
        Percentage($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([-1,101]);
