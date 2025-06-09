<?php

use function Withinboredom\Record\Common\NonEmptyString;

test('NonEmptyString', function ($value) {
    $v1 = NonEmptyString($value);
    $v2 = NonEmptyString($value);
    expect($v1)->toBe($v2);
})->with(['a','b','c']);

test('NonEmptyString fails', function ($value) {
    expect(function () use ($value) {
        NonEmptyString($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([' ']);
