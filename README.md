# IterableToArray::convert

A simple utility class that handles the boilerplate of converting an iterable into an array.

The goal of this utility is to be an in-place replacement for iterator_to_array whenever one must handle an iterable.

## Installation

    composer require navarr/iterable-to-array

## Usage

```php
<?php

use Navarr\Utils\IterableToArray

// ...

$array = IterableToArray::convert($iterable);

// This replaces:

$array = is_array($iterable) ? $iterable : iterator_to_array($iterable);
```

This also has (what should be unnecessary) forward compatibility for a scenario where an object passes the `iterable` type check but is neither an `array` nor a `\Traversable`.
