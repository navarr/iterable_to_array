# IterableToArray::convert
[![Latest Stable Version](http://poser.pugx.org/navarr/iterable-to-array/v)](https://packagist.org/packages/navarr/iterable-to-array)
[![Total Downloads](http://poser.pugx.org/navarr/iterable-to-array/downloads)](https://packagist.org/packages/navarr/iterable-to-array)
[![Latest Unstable Version](http://poser.pugx.org/navarr/iterable-to-array/v/unstable)](https://packagist.org/packages/navarr/iterable-to-array)
[![License](http://poser.pugx.org/navarr/iterable-to-array/license)](https://packagist.org/packages/navarr/iterable-to-array)  
[![Tests](https://github.com/navarr/iterable_to_array/actions/workflows/commit.yml/badge.svg)](https://github.com/navarr/iterable_to_array/actions/workflows/commit.yml)
[![Code Coverage](https://codecov.io/gh/navarr/iterable_to_array/branch/main/graph/badge.svg?token=DJRUJTV2GW)](https://app.codecov.io/gh/navarr/iterable_to_array/)
[![Mutation score](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fnavarr%2Fiterable_to_array%2Fmain)](https://dashboard.stryker-mutator.io/reports/github.com/navarr/iterable_to_array/main)

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
