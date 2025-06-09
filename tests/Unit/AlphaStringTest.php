<?php

use function Withinboredom\Record\Common\AlphaString;

test('AlphaString', function ($value) {
    $v1 = AlphaString($value);
    $v2 = AlphaString($value);
    expect($v1)->toBe($v2);
})->with(['a','b','c']);

test('AlphaString fails', function ($value) {
    expect(function () use ($value) {
        AlphaString($value);
    })->toThrow(\InvalidArgumentException::class);
})->with(['A1','B2','C3','1','2','3']);
