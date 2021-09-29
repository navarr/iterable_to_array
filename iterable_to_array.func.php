<?php

/**
 * Copyright (C) 2021 Navarr T. Barnier.  All rights reserved.
 * Licensed under MIT License.
 */

namespace Navarr\Utils;

use JetBrains\PhpStorm\Pure;

use function is_array;
use function iterator_to_array;

/**
 * Converts any iterable into an array
 *
 * Designed to reduce boilerplate of testing if an iterable is an array before calling {@see iterator_to_array}
 *
 * @param iterable $iterable <p>
 * The iterator being copied.
 * </p>
 * @param bool $preserve_keys [optional] <p>
 * Whether to use the iterator element keys as index.
 * </p>
 * @return array An array containing the elements of the iterable.
 */
#[Pure]
function iterable_to_array(iterable $iterable, bool $preserve_keys = true): array
{
    return is_array($iterable) ? $iterable : iterator_to_array($iterable, $preserve_keys);
}
