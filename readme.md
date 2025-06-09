# Common Records

This is a generated collection of common records (see [generator.php](generator.php)).

Included:

- DateTime
- NegativeFloat
- NegativeInt
- NonNegativeInt
- NonZeroFloat
- NonZeroInt
- Percentage
- PositiveFloat
- PositiveInt
- AlphaNumericString
- AlphaString
- LowercaseString
- NonEmptyString
- Slug
- TrimmedString
- UppercaseString

## Convention

1. Every type is also created as a function of the same name.
2. Every type implements `__invoke(): self` to extract the original value
3. Every type is strongly equal to another type of the same value (a record)

## Example Usage

```php

class User {
  public function __construct(
    public NonEmptyString $name,
    public PositiveInt $id,
  ) {}
}

$user = new User(NonEmptyString('Rob'), PositiveInt(123))

function getById(int $id) {
  /* do stuff */
}

getById($user->id() /* call __invoke to get the integer value */);
```

## Contributing

1. Fork this repository.
2. Add the new type to [`generator.php`](generator.php).
3. Execute `generator.php` and maybe add some tests.
4. Update the list in this readme.
5. Open a PR.
