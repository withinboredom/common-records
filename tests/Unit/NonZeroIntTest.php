<?php

use function Withinboredom\Record\Common\NonZeroInt;

test('NonZeroInt', function ($value) {
    $v1 = NonZeroInt($value);
    $v2 = NonZeroInt($value);
    expect($v1)->toBe($v2);
})->with([1,-2,3,\Withinboredom\Record\Common\Percentage(50),\Withinboredom\Record\Common\PositiveInt(60)]);

test('NonZeroInt fails', function ($value) {
    expect(function () use ($value) {
        NonZeroInt($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([0]);
