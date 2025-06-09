<?php

use function Withinboredom\Record\Common\NonZeroFloat;

test('NonZeroFloat', function ($value) {
    $v1 = NonZeroFloat($value);
    $v2 = NonZeroFloat($value);
    expect($v1)->toBe($v2);
})->with([1,-2,3]);

test('NonZeroFloat fails', function ($value) {
    expect(function () use ($value) {
        NonZeroFloat($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([0]);
