<?php

use function Withinboredom\Record\Common\LowercaseString;

test('LowercaseString', function ($value) {
    $v1 = LowercaseString($value);
    $v2 = LowercaseString($value);
    expect($v1)->toBe($v2);
})->with(['a','b','c']);

test('LowercaseString fails', function ($value) {
    expect(function () use ($value) {
        LowercaseString($value);
    })->toThrow(\InvalidArgumentException::class);
})->with(['A','B','C']);
