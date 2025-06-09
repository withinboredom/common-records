<?php

use function Withinboredom\Record\Common\DateTime;

it('can create from a date', function () {
    $og = new DateTimeImmutable('2022-01-01');
    $date = DateTime($og);
    $other = DateTime('2022-01-01');
    $other2 = DateTime($date);
    expect($date)
        ->toBeInstanceOf(\Withinboredom\Record\Common\Dates\DateTime::class)
        ->and($date->value)->toBe($og)
        ->and($date)->toBe($other)
        ->and($date)->toBe($other2);
});
