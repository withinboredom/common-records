<?php

use function Withinboredom\Record\Common\TrimmedString;

test('TrimmedString', function ($value) {
    $v1 = TrimmedString($value);
    $v2 = TrimmedString($value);
    expect($v1)->toBe($v2);
})->with(['a','b','c']);

test('TrimmedString fails', function ($value) {
    expect(function () use ($value) {
        TrimmedString($value);
    })->toThrow(\InvalidArgumentException::class);
})->with([' wicked','stuff ']);
