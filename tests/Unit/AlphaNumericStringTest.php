<?php

use function Withinboredom\Record\Common\AlphaNumericString;

test('AlphaNumericString', function ($value) {
    $v1 = AlphaNumericString($value);
    $v2 = AlphaNumericString($value);
    expect($v1)->toBe($v2);
})->with(['a','b','c','1','2','3']);

test('AlphaNumericString fails', function ($value) {
    expect(function () use ($value) {
        AlphaNumericString($value);
    })->toThrow(\InvalidArgumentException::class);
})->with(['@#$','---']);
