<?php

use function Withinboredom\Record\Common\LiteralString;

test('LiteralString', function ($value) {
    $v1 = LiteralString($value);
    $v2 = LiteralString($value);
    expect($v1)->toBe($v2);
})->with(['pass']);
