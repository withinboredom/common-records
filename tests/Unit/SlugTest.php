<?php

use function Withinboredom\Record\Common\Slug;

test('Slug', function ($value) {
    $v1 = Slug($value);
    $v2 = Slug($value);
    expect($v1)->toBe($v2);
})->with(['a','b','c','1','2','3','a-b','a-b-c']);

test('Slug fails', function ($value) {
    expect(function () use ($value) {
        Slug($value);
    })->toThrow(\InvalidArgumentException::class);
})->with(['@#$','fine_day']);
