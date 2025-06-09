<?php

use function Withinboredom\Record\Common\NonEmptyString;

it('revalidates', function () {
    $str = NonEmptyString('hello world');
    expect((string) $str)->toBe('hello world');

    $str = $str->with(value: 'goodbye world');
    expect($str)->toBe(NonEmptyString('goodbye world'));

    expect(fn() => $str = $str->with(value: ''))->toThrow(\InvalidArgumentException::class);
});
