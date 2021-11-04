# IterableToArray::convert
[![Latest Stable Version](http://poser.pugx.org/navarr/iterable_to_array/v)](https://packagist.org/packages/navarr/dependency-annotation)
[![Total Downloads](http://poser.pugx.org/navarr/iterable_to_array/downloads)](https://packagist.org/packages/navarr/dependency-annotation)
[![Latest Unstable Version](http://poser.pugx.org/navarr/iterable_to_array/v/unstable)](https://packagist.org/packages/navarr/dependency-annotation)
[![License](http://poser.pugx.org/navarr/iterable_to_array/license)](https://packagist.org/packages/navarr/dependency-annotation)  
![Tests](https://github.com/navarr/iterable_to_array/actions/workflows/commit.yml/badge.svg)
![Code Coverage](https://codecov.io/gh/navarr/iterable_to_array/branch/main/graph/badge.svg?token=DJRUJTV2GW)

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
