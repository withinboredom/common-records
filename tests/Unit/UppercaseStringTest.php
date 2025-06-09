<?php

use function Withinboredom\Record\Common\UppercaseString;

test('UppercaseString', function ($value) {
    $v1 = UppercaseString($value);
    $v2 = UppercaseString($value);
    expect($v1)->toBe($v2);
})->with(['A','B','C']);

test('UppercaseString fails', function ($value) {
    expect(function () use ($value) {
        UppercaseString($value);
    })->toThrow(\InvalidArgumentException::class);
})->with(['a','b','c']);
