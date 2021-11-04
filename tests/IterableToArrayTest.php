<?php

/**
 * Copyright (C) 2021 Navarr T. Barnier.  All rights reserved.
 * Licensed under MIT License.
 */

declare(strict_types=1);

namespace Navarr\Utils;

use ArrayIterator;
use PHPUnit\Framework\TestCase;

class IterableToArrayTest extends TestCase
{
    public function testConvertWithArray()
    {
        $array = ['a', 'b'];
        $this->assertEquals($array, IterableToArray::convert(['a', 'b']));
    }

    public function testConvertWithIterator()
    {
        $iterator = new ArrayIterator(['a', 'b']);
        $this->assertEquals(['a', 'b'], IterableToArray::convert($iterator));
    }
}
