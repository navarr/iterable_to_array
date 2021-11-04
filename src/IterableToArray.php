<?php

/**
 * Copyright (C) 2021 Navarr T. Barnier.  All rights reserved.
 * Licensed under MIT License.
 */

declare(strict_types=1);

namespace Navarr\Utils;

use JetBrains\PhpStorm\Pure;
use Traversable;

use function is_array;
use function iterator_to_array;

class IterableToArray
{
    /**
     * Converts any iterable into an array
     *
     * Designed to reduce boilerplate of testing if an iterable is an array before calling {@see iterator_to_array}
     *
     * @template T
     * @param iterable<T> $iterable <p>
     * The iterator being copied.
     * </p>
     * @param bool $preserve_keys [optional] <p>
     * Whether to use the iterator element keys as index. If an array is passed, keys are always preserved.
     * </p>
     * @return array<T> An array containing the elements of the iterable.
     */
    #[Pure]
    public static function convert(iterable $iterable, bool $preserve_keys = true): array
    {
        if (is_array($iterable)) {
            return $iterable;
        }

        if ($iterable instanceof Traversable) {
            return iterator_to_array($iterable, $preserve_keys);
        }

        // Fallback for supposedly impossible scenario
        return self::fallbackConvert($iterable, $preserve_keys);
    }

    /**
     * Fallback to convert an iterable into an array
     *
     * This should, theoretically, never be used.  However, for the sake of forward-compatibility, it exists and is
     * tested.
     *
     * It is extracted into its own private method to allow for unit testing.
     *
     * @template T
     * @param iterable<T> $iterable
     * @param bool $preserve_keys
     * @return array<T>
     */
    #[Pure]
    private static function fallbackConvert(iterable $iterable, bool $preserve_keys): array
    {
        $result = [];
        foreach ($iterable as $key => $value) {
            if ($preserve_keys) {
                $result[$key] = $value;
                continue;
            }
            $result[] = $value;
        }
        return $result;
    }
}
