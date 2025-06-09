<?php

use function Withinboredom\Record\Common\DateTime;

test('DateTime', function ($value) {
    $v1 = DateTime($value);
    $v2 = DateTime($value);
    expect($v1)->toBe($v2);
})->with(['2012-01-01',new \DateTimeImmutable("2012-01-01")]);
